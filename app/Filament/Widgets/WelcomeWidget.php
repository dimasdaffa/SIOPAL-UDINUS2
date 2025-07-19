<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WelcomeWidget extends Widget
{
    // Widget ini akan muncul di urutan pertama
    protected static ?int $sort = 1;

    // Widget akan menempati lebar penuh
    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.welcome-widget';

    // Mendapatkan nama pengguna yang sedang login
    public function getUserName()
    {
        return Auth::user()->name ?? 'Pengguna';
    }

    // Fungsi untuk memeriksa apakah widget ini dapat ditampilkan berdasarkan izin
    public static function canView(): bool
    {
        return Gate::check('view-widget', 'WelcomeWidget');
    }
}
