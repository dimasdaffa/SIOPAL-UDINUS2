<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class CalendarWidget extends Widget
{
    // Set urutan widget (semakin besar angka, semakin rendah posisi)
    protected static ?int $sort = 2;

    // Widget akan menggunakan lebar penuh
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.calendar-widget';
}
