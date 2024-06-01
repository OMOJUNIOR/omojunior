<?php

namespace App\Filament\Resources\RequestFormResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\RequestForm;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class RequestFormChart extends ChartWidget
{
    protected static ?string $heading = 'Request Form Chart';
    protected static string $color = 'warning';
    protected static ?string $pollingInterval = '10s';

    protected function getData(): array
    {
        $data = Trend::model(RequestForm::class)
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
                    'label' => 'Request Forms',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
            ],
            
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
