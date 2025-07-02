<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Inventory;

class SystemInfoWidget extends BaseWidget
{
    // Menambahkan properti untuk mendukung auto-discovery
    protected static ?string $pollingInterval = null;

    // Urutan widget pada dashboard
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        // Hitung jumlah PC
        $pcCount = Inventory::where('inventoriable_type', 'App\Models\PCDetail')->count();

        // Hitung jumlah Non-PC
        $nonPcCount = Inventory::where('inventoriable_type', 'App\Models\NonPCDetail')->count();

        // Hitung jumlah Software
        $softwareCount = Inventory::where('inventoriable_type', 'App\Models\SoftwareDetail')->count();

        return [
            Stat::make('Total PC', number_format($pcCount))
                ->description('Jumlah PC yang terdaftar')
                ->descriptionIcon('heroicon-o-computer-desktop')
                ->color('success'),

            Stat::make('Total Non-PC', number_format($nonPcCount))
                ->description('Jumlah perangkat Non-PC')
                ->descriptionIcon('heroicon-o-cpu-chip')
                ->color('warning'),

            Stat::make('Total Software', number_format($softwareCount))
                ->description('Jumlah software yang terinstal')
                ->descriptionIcon('heroicon-o-code-bracket-square')
                ->color('danger'),
        ];
    }
}
