<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\RequestForm;
use App\Models\Language;
use App\Models\Service;

class TotalUserStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total requests', RequestForm::count())
                ->description(RequestForm::countIncreasInRequest() . ' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total languages', Language::count())
                ->description('languages available'),
            Stat::make('Total services', Service::count())
                ->description('services available'),
        ];
    }
}
