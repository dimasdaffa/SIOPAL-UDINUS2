<?php

namespace App\Filament\Widgets;

use App\Models\Inventory;
use App\Models\Laboratorium;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Gate;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalLaboran = User::count();
        $totalLaboratorium = Laboratorium::count();

        // Hitung jumlah PC
        $pcCount = Inventory::where('inventoriable_type', 'App\Models\PCDetail')->count();

        // Hitung jumlah Non-PC
        $nonPcCount = Inventory::where('inventoriable_type', 'App\Models\NonPCDetail')->count();

        // Hitung jumlah Software
        $softwareCount = Inventory::where('inventoriable_type', 'App\Models\SoftwareDetail')->count();

        return [
            Stat::make('Total Laboran', $totalLaboran)
                ->description('Jumlah laboran yang terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Total Laboratorium', $totalLaboratorium)
                ->description('Jumlah laboratorium yang tersedia')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),

            Stat::make('Total PC', $pcCount)
                ->description('Jumlah inventaris PC')
                ->descriptionIcon('heroicon-m-computer-desktop')
                ->color('warning'),

            Stat::make('Total Non-PC', $nonPcCount)
                ->description('Jumlah inventaris Non-PC')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color('danger'),

            Stat::make('Total Software', $softwareCount)
                ->description('Jumlah inventaris Software')
                ->descriptionIcon('heroicon-m-code-bracket-square')
                ->color('info'),
        ];
    }

    // Fungsi untuk memeriksa apakah widget ini dapat ditampilkan berdasarkan izin
    public static function canView(): bool
    {
        return Gate::check('view-widget', 'StatsOverviewWidget');
    }
}
