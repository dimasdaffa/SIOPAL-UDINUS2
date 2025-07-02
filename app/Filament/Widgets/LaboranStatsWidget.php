<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaboranStatsWidget extends BaseWidget
{
    // Menambahkan properti untuk mendukung auto-discovery
    protected static ?string $pollingInterval = null;

    // Urutan widget pada dashboard
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Laboran', User::count())
                ->description('Jumlah total laboran yang terdaftar')
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),
        ];
    }
}
