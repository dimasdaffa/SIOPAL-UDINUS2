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

test('inventory dapat terhubung ke laboratorium', function () {
    // Create lab and PC detail
    $lab = Laboratorium::factory()->create();
    $pcDetail = PCDetail::factory()->create();

    // Create an inventory in the lab
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\PCDetail';
    $inventory->inventoriable_id = $pcDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Reload the inventory with its laboratorium relationship
    $inventory = Inventory::with('laboratorium')->find($inventory->id);

    // Test that the relationship returns the correct lab
    expect($inventory->laboratorium)->toBeInstanceOf(Laboratorium::class);
    expect($inventory->laboratorium->id)->toBe($lab->id);
    expect($inventory->laboratorium->ruang)->toBe($lab->ruang);
});

test('inventory dapat terhubung ke PCDetail melalui polymorphic', function () {
    // Create lab and PC detail
    $lab = Laboratorium::factory()->create();
    $pcDetail = PCDetail::factory()->create();

    // Create an inventory for the PC
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\PCDetail';
    $inventory->inventoriable_id = $pcDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Reload the inventory with its inventoriable relationship
    $inventory = Inventory::with('inventoriable')->find($inventory->id);

    // Test that the polymorphic relationship returns the correct detail
    expect($inventory->inventoriable)->toBeInstanceOf(PCDetail::class);
    expect($inventory->inventoriable->id)->toBe($pcDetail->id);
    expect($inventory->inventoriable->nama_pc)->toBe($pcDetail->nama_pc);
});

test('inventory dapat terhubung ke NonPCDetail melalui polymorphic', function () {
    // Create lab and Non-PC detail
    $lab = Laboratorium::factory()->create();
    $nonPcDetail = NonPCDetail::factory()->create();

    // Create an inventory for the Non-PC
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\NonPCDetail';
    $inventory->inventoriable_id = $nonPcDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Reload the inventory with its inventoriable relationship
    $inventory = Inventory::with('inventoriable')->find($inventory->id);

    // Test that the polymorphic relationship returns the correct detail
    expect($inventory->inventoriable)->toBeInstanceOf(NonPCDetail::class);
    expect($inventory->inventoriable->id)->toBe($nonPcDetail->id);
    expect($inventory->inventoriable->nama)->toBe($nonPcDetail->nama);
});

test('inventory dapat terhubung ke SoftwareDetail melalui polymorphic', function () {
    // Create lab and Software detail
    $lab = Laboratorium::factory()->create();
    $softwareDetail = SoftwareDetail::factory()->create();

    // Create an inventory for the software
    $inventory = new Inventory();
    $inventory->laboratorium_id = $lab->id;
    $inventory->inventoriable_type = 'App\Models\SoftwareDetail';
    $inventory->inventoriable_id = $softwareDetail->id;
    $inventory->kondisi = 'Baik';
    $inventory->save();

    // Reload the inventory with its inventoriable relationship
    $inventory = Inventory::with('inventoriable')->find($inventory->id);

    // Test that the polymorphic relationship returns the correct detail
    expect($inventory->inventoriable)->toBeInstanceOf(SoftwareDetail::class);
    expect($inventory->inventoriable->id)->toBe($softwareDetail->id);
    expect($inventory->inventoriable->nama)->toBe($softwareDetail->nama);
});
