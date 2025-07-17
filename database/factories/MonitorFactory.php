<?php

namespace Database\Factories;

use App\Models\Monitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonitorFactory extends Factory
{
    protected $model = Monitor::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['LG', 'Samsung', 'Asus', 'BenQ', 'Dell']) . ' ' .
                     fake()->randomElement(['24', '27', '32']) . 'inch',
            'ukuran' => fake()->randomElement(['24', '27', '32']) . ' inch',
            'resolusi' => fake()->randomElement(['1920x1080', '2560x1440', '3840x2160']),
            'panel' => fake()->randomElement(['IPS', 'VA', 'TN']),
            'refresh_rate' => fake()->randomElement(['60', '75', '144', '165']) . ' Hz',
        ];
    }
}
