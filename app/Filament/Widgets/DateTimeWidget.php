<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DateTimeWidget extends Widget
{
    protected static string $view = 'filament.widgets.date-time-widget';

    // Widget akan menempati lebar penuh
    protected int | string | array $columnSpan = 'full';
}
