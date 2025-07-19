<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Gate;

class CalendarWidget extends Widget
{
    // Set urutan widget (semakin besar angka, semakin rendah posisi)
    protected static ?int $sort = 2;

    // Widget akan menggunakan lebar penuh
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.calendar-widget';

    // Fungsi untuk memeriksa apakah widget ini dapat ditampilkan berdasarkan izin
    public static function canView(): bool
    {
        return Gate::check('view-widget', 'CalendarWidget');
    }
}
