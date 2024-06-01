<?php

namespace App\Filament\Resources\ContentResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Modules\Content\Models\ContentRequest;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ContentRequestChart extends ChartWidget
{
    protected static ?string $heading = 'Content Request Chart';

   // public ?string $filter = 'today';

    protected function getData(): array
    {
        //$activeFilter = $this->filter;

        $data = Trend::model(ContentRequest::class)

            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'labels' =>  $data->map(fn (TrendValue $value) => $value->date),
            'datasets' => [
                [
                    'label' => 'Content Requests',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
        ];
    }





    protected function getType(): string
    {
        return 'bar';
    }
}
