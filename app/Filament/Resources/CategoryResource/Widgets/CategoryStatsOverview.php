<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CategoryStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count()),
            Stat::make('Total Active Posts', Post::where('approved', 1)->count()),
            Stat::make('Total Users', User::count()),

        ];

    }
}
