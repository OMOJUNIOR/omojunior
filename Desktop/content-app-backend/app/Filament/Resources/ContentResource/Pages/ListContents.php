<?php

namespace App\Filament\Resources\ContentResource\Pages;

use App\Filament\Resources\ContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Modules\Content\Models\ContentRequest;
use Illuminate\Mail\Mailables\Content;

class ListContents extends ListRecords
{
    protected static string $resource = ContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
           'assigned' => Tab::make()
                ->badge(ContentRequest::query()->where('status','assigned')->count())
                ->badgeColor('success'),
            'active' => Tab::make()
                ->badge(User::query()->where('id', '>', 1)->count())
                ->badgeColor('success'),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('active', false)),
        ];
    }

    public function getQuery()
    {
        return parent::getQuery()->with('user');
    }

    public function getColumns(): array
    {
        return [
            'user.name',
            'language',
            'word_count',
            'topic',
            'delivery_date',
            'project_id',
        ];
    }

    public function getRecordActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }


    public function getFilters(): array
    {
        return [
            'language' => [
                'type' => 'select',
                'options' => [
                    'English' => 'English',
                    'Spanish' => 'Spanish',
                    'French' => 'French',
                    'German' => 'German',
                    'Italian' => 'Italian'
                ],
            ],
            'word_count' => [
                'type' => 'select',
                'options' => [
                    '1000' => '1000',
                    '2000' => '2000',
                    '3000' => '3000',
                    '4000' => '4000',
                    '5000' => '5000'
                ],
            ],

            'topic' => [
                'type' => 'select',
                'options' => [
                    'Test Topic' => 'Test Topic',
                    'Test Topic 2' => 'Test Topic 2',
                    'Test Topic 3' => 'Test Topic 3',
                    'Test Topic 4' => 'Test Topic 4',
                    'Test Topic 5' => 'Test Topic 5'
                ],
            ],

            'delivery_date' => [
                'type' => 'date_range',
            ],

            'project_id' => [
                'type' => 'select',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ],
            ],

        ];

    }
}
