<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Academics', User::whereIn('role', [1, 2, 3, 4])->count()),
            Stat::make('Total Students', User::where('role', '5')->count()),
            Stat::make('Total Alumni', User::where('role', '6')->count()),
        ];
    }
}
