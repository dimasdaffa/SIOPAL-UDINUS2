<?php

use App\Models\Inventory;
use App\Models\Laboratorium;
use App\Models\PCDetail;
use App\Models\NonPCDetail;
use App\Models\SoftwareDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Skip tests if the required tables don't exist in the test database
    if (!Schema::hasTable('inventories') || !Schema::hasTable('laboratoria')) {
        $this->markTestSkipped('Required tables do not exist in the test database.');
    }
});

test('kode inventaris PC dihasilkan dengan format yang benar', function () {
    // Create a lab with a specific room name for predictable testing
    $lab = Laboratorium::factory()->create(['ruang' => 'D2.1']);

    // Create a PC detail
    $pcDetail = PCDetail::factory()->create();

    // Create an inventory for the PC
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\PCDetail';
    $inventory->inventoriable_id = $pcDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Expected format: UDN/LABKOM/INV/D2.1/PC01
    expect($inventory->kode_inventaris)->toStartWith('UDN/LABKOM/INV/D2.1/PC');
    expect($inventory->kode_inventaris)->toMatch('/UDN\/LABKOM\/INV\/D2\.1\/PC\d{2}/');
});

test('kode inventaris Non-PC dihasilkan dengan format yang benar', function () {
    // Create a lab with a specific room name for predictable testing
    $lab = Laboratorium::factory()->create(['ruang' => 'D3.2']);

    // Create a non-PC detail
    $nonPcDetail = NonPCDetail::factory()->create();

    // Create an inventory for the non-PC
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\NonPCDetail';
    $inventory->inventoriable_id = $nonPcDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Expected format: UDN/LABKOM/INV/NON-PC/D3.2/01
    expect($inventory->kode_inventaris)->toStartWith('UDN/LABKOM/INV/NON-PC/D3.2/');
    expect($inventory->kode_inventaris)->toMatch('/UDN\/LABKOM\/INV\/NON-PC\/D3\.2\/\d{2}/');
});

test('kode inventaris Software dihasilkan dengan format yang benar', function () {
    // Create a lab with a specific room name for predictable testing
    $lab = Laboratorium::factory()->create(['ruang' => 'D4.3']);

    // Create a software detail
    $softwareDetail = SoftwareDetail::factory()->create();

    // Create an inventory for the software
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\SoftwareDetail';
    $inventory->inventoriable_id = $softwareDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Expected format: UDN/LABKOM/INV/SOFTWARE/D4.3/01
    expect($inventory->kode_inventaris)->toStartWith('UDN/LABKOM/INV/SOFTWARE/D4.3/');
    expect($inventory->kode_inventaris)->toMatch('/UDN\/LABKOM\/INV\/SOFTWARE\/D4\.3\/\d{2}/');
});

test('penomoran inventaris berjalan secara berurutan untuk setiap laboratorium', function () {
    // Create a lab
    $lab = Laboratorium::factory()->create(['ruang' => 'D5.1']);

    // Create two PC details
    $pcDetail1 = PCDetail::factory()->create();
    $pcDetail2 = PCDetail::factory()->create();

    // Create first PC inventory
    $inventory1 = new Inventory();
    $inventory1->laboratorium_id = $lab->id;
    $inventory1->inventoriable_type = 'App\Models\PCDetail';
    $inventory1->inventoriable_id = $pcDetail1->id;
    $inventory1->kondisi = 'Baik';
    $inventory1->save();

    // Create second PC inventory
    $inventory2 = new Inventory();
    $inventory2->laboratorium_id = $lab->id;
    $inventory2->inventoriable_type = 'App\Models\PCDetail';
    $inventory2->inventoriable_id = $pcDetail2->id;
    $inventory2->kondisi = 'Baik';
    $inventory2->save();

    // Check that the second inventory code has a higher number than the first
    expect($inventory1->kode_inventaris)->toBe('UDN/LABKOM/INV/D5.1/PC01');
    expect($inventory2->kode_inventaris)->toBe('UDN/LABKOM/INV/D5.1/PC02');
});
