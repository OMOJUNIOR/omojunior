<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentResource\Pages;
use App\Filament\Resources\ContentResource\RelationManagers;
use App\Modules\Content\Models\ContentRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\Action;
use App\Models\User;
use App\Modules\Writer\Models\Writer;
use Filament\Support\Enums\MaxWidth;
use App\Modules\Content\Services\Crud\UpdateContentRequestService;
use Filament\Notifications\Notification;

class ContentResource extends Resource
{
    protected static ?string $model = ContentRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')->columnSpan(2)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Section::make('Publishing')
                    ->description('Settings for publishing this post.')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'reviewing' => 'Reviewing',
                                'published' => 'Published',
                            ])->required()
                            ->live()
                            ->default('draft'),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->hidden(fn (Get $get) => $get('status') !== 'published'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('language')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('word_count')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('topic')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('delivery_date')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name',)
                    ->searchable()
                    ->sortable()
                    ->label('Customer Name'),
                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),

            ])->searchDebounce('950ms')
            ->filters([

                SelectFilter::make('language')
                    ->options([
                        'English' => 'English',
                        'Spanish' => 'Spanish',
                        'French' => 'French',
                        'German' => 'German'
                    ])->label('Choose a Language'),


            ])
            ->actions([

                Tables\Actions\ViewAction::make(),
                Action::make('Assign')
                    ->successNotification(
                        Notification::make('Content assigned to writer')
                            ->success()
                            ->body('Content has been successfully assigned to writer')
                    )
                    ->form([
                        Forms\Components\Select::make('writer_id')
                            ->options(Writer::with('user')->get()->pluck('user.name', 'id'))->required()
                            ->label('Choose a Writer to assign this content to')
                    ])
                    ->action(function (ContentRequest $contentRequest, $data) {
                        $service = new UpdateContentRequestService();
                        $data['writer_id'] = $data['writer_id'];
                        $data['status'] = 'assigned';
                        $service->updateContentRequest($contentRequest->id, $data);
                    })
                    ->modalWidth(MaxWidth::Large),




            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),


        ];
    }
}
