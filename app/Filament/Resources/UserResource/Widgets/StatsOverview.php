<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
//    protected function getStats(): array
//    {
//        return [
//            Stat::make('All Users', User::count()),
//            Stat::make('Faculty Members', User::whereIn('role', [1,2,3,4,5,6])->count()),
//            Stat::make('Students', User::where('role', '7')->count()),
//            Stat::make('Alumni', User::where('role', '8')->count()),
//        ];
//    }
}
