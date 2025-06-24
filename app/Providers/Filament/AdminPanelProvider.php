<?php

namespace App\Providers\Filament;

use App\Filament\Resources\PCInventoryResource;
use App\Filament\Resources\NonPCInventoryResource;
use App\Filament\Resources\SoftwareInventoryResource;
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
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // ...
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
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $initialGroups = [
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

                        ]),

                    // Add Data Hardware group with all hardware resources
                    NavigationGroup::make('DATA HARDWARE')
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
                    NavigationGroup::make('Pelaporan PTPP')
                        ->items([
                            NavigationItem::make('PTTP SKT')
                                ->icon('heroicon-o-document-text')
                                ->url(\App\Filament\Resources\LaporPtppResource::getUrl())
                                ->isActiveWhen(fn() => request()->routeIs(\App\Filament\Resources\LaporPtppResource::getRouteBaseName() . '.*')),
                        ]),
                ];

                $labItems = [];
                // Ambil semua lab dari database untuk membuat navigasi dinamis
                $laboratories = Laboratorium::query()->orderBy('ruang')->get();

                foreach ($laboratories as $lab) {
                    $labItems[] = NavigationGroup::make($lab->ruang)
                        ->items([
                            NavigationItem::make('Inventaris PC')
                                ->icon('heroicon-o-computer-desktop')
                                ->url(fn() => PCInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                ->isActiveWhen(fn() => request()->routeIs(PCInventoryResource::getRouteBaseName().'.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                            NavigationItem::make('Inventaris Non-PC')
                                ->icon('heroicon-o-cpu-chip')
                                ->url(fn() => NonPCInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                ->isActiveWhen(fn() => request()->routeIs(NonPCInventoryResource::getRouteBaseName().'.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),

                            NavigationItem::make('Inventaris Software')
                                ->icon('heroicon-o-code-bracket-square')
                                ->url(fn() => SoftwareInventoryResource::getUrl('index', ['tableFilters[laboratorium][value]' => $lab->id]))
                                ->isActiveWhen(fn() => request()->routeIs(SoftwareInventoryResource::getRouteBaseName().'.index') && request()->input('tableFilters.laboratorium.value') == $lab->id),
                        ]);
                }

                return $builder->groups(array_merge($initialGroups, $labItems));
            });
    }
}
