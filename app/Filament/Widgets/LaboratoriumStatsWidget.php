<?php

namespace App\Filament\Widgets;

use App\Models\Laboratorium;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaboratoriumStatsWidget extends BaseWidget
{
    // Menambahkan properti untuk mendukung auto-discovery
    protected static ?string $pollingInterval = null;

    // Urutan widget pada dashboard
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Laboratorium', Laboratorium::count())
                ->description('Jumlah total laboratorium yang tersedia')
                ->descriptionIcon('heroicon-o-building-office')
                ->color('primary'),
        ];
    }
}
