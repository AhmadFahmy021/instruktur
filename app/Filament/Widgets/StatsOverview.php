<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->description('Data of all registered users')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->color('danger')
            ,

            Stat::make('Total Instruktur', User::where('role', '2')->count())
                ->color('warning')
                ->description('Data of all users as instructors')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
            ,

            Stat::make('Total Mahasiswa', User::where('role', '3')->count())
                ->description('Data of all users as students')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->color('success')
            ,
        ];
    }
}
