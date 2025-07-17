<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use App\Filament\Resources\BarangKeluarResource;
use App\Filament\Resources\BarangMasukResource;
use App\Filament\Resources\PCInventoryResource;
use App\Filament\Resources\NonPCInventoryResource;
use App\Filament\Resources\SoftwareInventoryResource;
use App\Filament\Widgets\CalendarWidget;
use App\Filament\Widgets\KalenderAkademikWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\WelcomeWidget;
use App\Models\Laboratorium;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->spa()
            ->login()
            ->colors([
                'primary' => '#104b8f',
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('3s')
            ->favicon(url('images/udinus.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class, // Menggunakan Dashboard kustom kita
            ])
            ->widgets([
                WelcomeWidget::class,
                StatsOverviewWidget::class,
                KalenderAkademikWidget::class,
                CalendarWidget::class,
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
            ->plugins([
                FilamentShieldPlugin::make(),
            ])

            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $initialGroups = [
                    // Tambahkan Dashboard di awal navigasi
                    NavigationGroup::make('Menu Utama')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->url(fn() => Dashboard::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs('filament.admin.pages.dashboard')),
                        ]),

                    NavigationGroup::make('Pelaporan PTPP')
                        ->items([
                            NavigationItem::make('PTTP SKT')
                                ->icon('heroicon-o-document-text')
                                ->url(\App\Filament\Resources\LaporPtppResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\LaporPtppResource::getRouteBaseName() . '.*')),
                        ]),
                    // Add Master Data group with static resources
                    NavigationGroup::make('MASTER DATA')
                        ->items([
                            NavigationItem::make('Data Laboran')
                                ->icon('heroicon-o-users')
                                ->url(\App\Filament\Resources\UserResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\UserResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Data Laboratorium')
                                ->icon('heroicon-o-building-office')
                                ->url(\App\Filament\Resources\LaboratoriumResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\LaboratoriumResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Data Klasifikasi Lab')
                                ->icon('fluentui-dual-screen-desktop-24-o')
                                ->url(\App\Filament\Resources\KlasifikasiLabResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\KlasifikasiLabResource::getRouteBaseName() . '.*')),

                            // Add Shield Permission navigation item
                            NavigationItem::make('Permissions')
                                ->icon('heroicon-o-shield-check')
                                ->url(fn () => route('filament.admin.resources.shield.roles.index'))
                                ->isActiveWhen(fn() => request()->routeIs('filament.admin.resources.shield.roles.*')),
                        ]),

                    // Add Data Hardware group with all hardware resources
                    NavigationGroup::make('Data Hardware')
                        ->items([
                            NavigationItem::make('Motherboard')
                                ->icon('mdi-chip')
                                ->url(\App\Filament\Resources\MotherboardResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\MotherboardResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Processor')
                                ->icon('heroicon-o-cpu-chip')
                                ->url(\App\Filament\Resources\ProcessorResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\ProcessorResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('RAM')
                                ->icon('fluentui-ram-20')
                                ->url(\App\Filament\Resources\RAMResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\RAMResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('VGA')
                                ->icon('clarity-box-plot-line')
                                ->url(\App\Filament\Resources\VGAResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\VGAResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Penyimpanan')
                                ->icon('clarity-hard-disk-line')
                                ->url(\App\Filament\Resources\PenyimpananResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\PenyimpananResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('DVD')
                                ->icon('clarity-cd-dvd-line')
                                ->url(\App\Filament\Resources\DVDResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\DVDResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('PSU')
                                ->icon('mdi-cube')
                                ->url(\App\Filament\Resources\PSUResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\PSUResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Keyboard')
                                ->icon('clarity-keyboard-line')
                                ->url(\App\Filament\Resources\KeyboardResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\KeyboardResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Mouse')
                                ->icon('clarity-mouse-line')
                                ->url(\App\Filament\Resources\MouseResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\MouseResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Monitor')
                                ->icon('mdi-monitor-small')
                                ->url(\App\Filament\Resources\MonitorResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\MonitorResource::getRouteBaseName() . '.*')),

                            NavigationItem::make('Headphone')
                                ->icon('fluentui-headphones-24')
                                ->url(\App\Filament\Resources\HeadphoneResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\HeadphoneResource::getRouteBaseName() . '.*')),
                        ]),

                    // Add Pelaporan PTPP group

                ];

                $labItems = [];
                // Ambil semua lab dari database untuk membuat navigasi dinamis
                $laboratories = Laboratorium::query()->orderBy('ruang')->get();

                foreach ($laboratories as $lab) {
                    $labSlug = strtolower(str_replace([' ', '.'], ['_', '_'], $lab->ruang));

                    // Only add this lab group if the user has permission to view it
                    if (auth()->user() && (auth()->user()->can("lab_view_{$labSlug}") || auth()->user()->hasRole('super_admin'))) {
                        $labItems[] = NavigationGroup::make($lab->ruang)
                            ->items([
                                NavigationItem::make('Inventaris PC')
                                    ->icon('heroicon-o-computer-desktop')
                                    ->url(fn() => PCInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                    ->isActiveWhen(fn() => request()->routeIs(PCInventoryResource::getRouteBaseName() . '.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                                NavigationItem::make('Inventaris Non-PC')
                                    ->icon('heroicon-o-cpu-chip')
                                    ->url(fn() => NonPCInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                    ->isActiveWhen(fn() => request()->routeIs(NonPCInventoryResource::getRouteBaseName() . '.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                                NavigationItem::make('Inventaris Software')
                                    ->icon('heroicon-o-code-bracket-square')
                                    ->url(fn() => SoftwareInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                    ->isActiveWhen(fn() => request()->routeIs(SoftwareInventoryResource::getRouteBaseName() . '.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                                NavigationItem::make('Barang Masuk')
                                    ->icon('heroicon-o-arrow-down-tray')
                                    ->url(fn() => BarangMasukResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                    ->isActiveWhen(fn() => request()->routeIs(BarangMasukResource::getRouteBaseName() . '.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                                NavigationItem::make('Barang Keluar')
                                    ->icon('heroicon-o-arrow-up-tray')
                                    ->url(fn() => BarangKeluarResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                    ->isActiveWhen(fn() => request()->routeIs(BarangKeluarResource::getRouteBaseName() . '.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),
                            ]);
                    }
                }

                return $builder->groups(array_merge($initialGroups, $labItems));
            });
    }
}
