<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Laboratorium;
use App\Models\Inventory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung data yang diperlukan
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
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),

            Stat::make('Total Laboratorium', $totalLaboratorium)
                ->description('Jumlah laboratorium yang tersedia')
                ->descriptionIcon('heroicon-o-building-office')
                ->color('primary'),

            Stat::make('Total PC', number_format($pcCount))
                ->description('Jumlah PC yang terdaftar')
                ->descriptionIcon('heroicon-o-computer-desktop')
                ->color('warning'),

            Stat::make('Total Non-PC', number_format($nonPcCount))
                ->description('Jumlah perangkat Non-PC')
                ->descriptionIcon('heroicon-o-cpu-chip')
                ->color('danger'),

            Stat::make('Total Software', number_format($softwareCount))
                ->description('Jumlah software yang terinstal')
                ->descriptionIcon('heroicon-o-code-bracket-square')
                ->color('info'),
        ];
    }
}
