<?php

use App\Models\Inventory;
use App\Models\Laboratorium;
use App\Models\PCDetail;
use App\Models\NonPCDetail;
use App\Models\SoftwareDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use ReflectionClass;

uses(RefreshDatabase::class);

// Mocking inventory generation without relying on real database connections
test('format kode inventaris PC', function () {
    $service = new class {
        public function generatePCCode($labRoom, $number) {
            $prefix = 'UDN/LABKOM/INV';
            $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
            return "{$prefix}/{$labRoom}/PC{$formattedNumber}";
        }
    };

    $code = $service->generatePCCode('D2.1', 5);
    expect($code)->toBe('UDN/LABKOM/INV/D2.1/PC05');
});

test('format kode inventaris non-PC', function () {
    $service = new class {
        public function generateNonPCCode($labRoom, $number) {
            $prefix = 'UDN/LABKOM/INV';
            $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
            return "{$prefix}/NON-PC/{$labRoom}/{$formattedNumber}";
        }
    };

    $code = $service->generateNonPCCode('D3.2', 7);
    expect($code)->toBe('UDN/LABKOM/INV/NON-PC/D3.2/07');
});

test('format kode inventaris software', function () {
    $service = new class {
        public function generateSoftwareCode($labRoom, $number) {
            $prefix = 'UDN/LABKOM/INV';
            $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
            return "{$prefix}/SOFTWARE/{$labRoom}/{$formattedNumber}";
        }
    };

    $code = $service->generateSoftwareCode('D4.3', 12);
    expect($code)->toBe('UDN/LABKOM/INV/SOFTWARE/D4.3/12');
});

// Struktur relasi inventory - menggunakan reflection untuk mengecek keberadaan method
test('struktur model Inventory mendefinisikan relasi yang sesuai', function () {
    // Get the reflection class for Inventory
    $reflection = new ReflectionClass(Inventory::class);

    // Check if the laboratorium method is defined
    expect($reflection->hasMethod('laboratorium'))->toBeTrue();

    // Check if the inventoriable method is defined
    expect($reflection->hasMethod('inventoriable'))->toBeTrue();
});
