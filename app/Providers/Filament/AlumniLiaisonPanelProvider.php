<?php

namespace App\Providers\Filament;

use App\Http\Middleware\VerifyIsAlumiLiaisonsMiddleware;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AlumniLiaisonPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('alumniLiaison')
            ->path('alumniLiaison')
            ->databaseNotifications()

            ->colors([
                'primary' => Color::hex('#04B4AC'),
            ])
            ->discoverResources(in: app_path('Filament/AlumniLiaison/Resources'), for: 'App\\Filament\\AlumniLiaison\\Resources')
            ->discoverPages(in: app_path('Filament/AlumniLiaison/Pages'), for: 'App\\Filament\\AlumniLiaison\\Pages')
            ->pages([
//                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/AlumniLiaison/Widgets'), for: 'App\\Filament\\AlumniLiaison\\Widgets')
            ->widgets([
//                Widgets\AccountWidget::class,
//                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                VerifyIsAlumiLiaisonsMiddleware::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
