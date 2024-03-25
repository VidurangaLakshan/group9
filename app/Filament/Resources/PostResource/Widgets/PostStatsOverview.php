<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Active Posts', Post::where('approved', 1)->count()),
            Stat::make('Total Rejected Posts', Post::where('approved', 0)->count()),
            // name of the user with most of the posts
            Stat::make('Most Active Author', User::whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->first()->name),
        ];
    }
}
