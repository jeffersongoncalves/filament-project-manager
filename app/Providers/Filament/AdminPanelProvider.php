<?php

namespace App\Providers\Filament;

use App\Filament\Panel\Admin\Pages\Auth\Login;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Vite;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->authGuard('admin')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandLogo(fn () => Vite::asset(config('filakit.favicon.logo')))
            ->brandLogoHeight(fn () => request()->is('admin/login', 'admin/password-reset/*') ? '121px' : '50px')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->defaultThemeMode(config('filakit.theme_mode', ThemeMode::Dark))
            ->discoverResources(in: app_path('Filament/Panel/Admin/Resources'), for: 'App\\Filament\\Panel\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Panel/Admin/Pages'), for: 'App\\Filament\\Panel\\Admin\\Pages')
            ->discoverWidgets(in: app_path('Filament/Panel/Widgets'), for: 'App\\Filament\\Panel\\Widgets')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationGroups([
                __('User'),
                __('Management'),
            ])
            ->plugins([
                //
            ])
            ->unsavedChangesAlerts()
            ->passwordReset()
            ->profile()
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s');
    }
}
