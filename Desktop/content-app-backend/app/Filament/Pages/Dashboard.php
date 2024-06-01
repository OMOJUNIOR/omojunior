<?php
namespace App\Filament\Pages;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
 
class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
 
   public function getTitle(): string
    {
        return 'Dashboard';
    }

    public function getSubheading(): ?string
    {
        return 'Welcome to the Admin Dashboard'. ' ' . auth()->user()->name;
    }
 
    
}