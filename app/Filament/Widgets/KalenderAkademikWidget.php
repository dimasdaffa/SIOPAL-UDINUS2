<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class KalenderAkademikWidget extends Widget
{
    // Set urutan widget di dashboard menjadi lebih tinggi prioritasnya
    protected static ?int $sort = 2;

    // Pastikan widget selalu terlihat
    protected static bool $isLazy = false;

    // Widget akan menggunakan lebar penuh
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.kalender-akademik-widget';
}
