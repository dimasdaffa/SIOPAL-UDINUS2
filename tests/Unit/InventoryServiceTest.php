<?php

use Carbon\Carbon;

// Example Inventory Service Class for testing
class InventoryService
{
    public function generateInventoryCode($labRoom, $type, $number)
    {
        $prefix = 'UDN/LABKOM/INV';

        switch ($type) {
            case 'pc':
                $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
                return "{$prefix}/{$labRoom}/PC{$formattedNumber}";
            case 'non-pc':
                $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
                return "{$prefix}/NON-PC/{$labRoom}/{$formattedNumber}";
            case 'software':
                $formattedNumber = str_pad($number, 2, '0', STR_PAD_LEFT);
                return "{$prefix}/SOFTWARE/{$labRoom}/{$formattedNumber}";
            default:
                throw new InvalidArgumentException("Type tidak valid: {$type}");
        }
    }

    public function calculateTotalInventory($items)
    {
        return array_sum($items);
    }

    public function isItemExpired($expirationDate)
    {
        $expiration = Carbon::parse($expirationDate);
        return Carbon::now()->greaterThan($expiration);
    }

    public function calculateMaintenanceDate($purchaseDate, $maintenancePeriod = 6)
    {
        $purchase = Carbon::parse($purchaseDate);
        return $purchase->addMonths($maintenancePeriod)->format('Y-m-d');
    }
}

test('kode inventaris PC dihasilkan dengan format yang benar', function () {
    $service = new InventoryService();
    $code = $service->generateInventoryCode('D2.1', 'pc', 5);

    // Test apakah kode dihasilkan dengan format yang benar
    expect($code)->toBe('UDN/LABKOM/INV/D2.1/PC05');
});

test('kode inventaris Non-PC dihasilkan dengan format yang benar', function () {
    $service = new InventoryService();
    $code = $service->generateInventoryCode('D3.2', 'non-pc', 7);

    // Test apakah kode dihasilkan dengan format yang benar
    expect($code)->toBe('UDN/LABKOM/INV/NON-PC/D3.2/07');
});

test('kode inventaris Software dihasilkan dengan format yang benar', function () {
    $service = new InventoryService();
    $code = $service->generateInventoryCode('D4.3', 'software', 12);

    // Test apakah kode dihasilkan dengan format yang benar
    expect($code)->toBe('UDN/LABKOM/INV/SOFTWARE/D4.3/12');
});

test('error dilemparkan untuk tipe inventaris yang tidak valid', function () {
    $service = new InventoryService();

    // Test apakah exception dilemparkan untuk tipe yang tidak valid
    expect(fn() => $service->generateInventoryCode('D2.1', 'invalid-type', 1))
        ->toThrow(InvalidArgumentException::class, "Type tidak valid: invalid-type");
});

test('total inventaris dihitung dengan benar', function () {
    $service = new InventoryService();
    $items = [5, 10, 15, 20];

    $total = $service->calculateTotalInventory($items);

    expect($total)->toBe(50);
});

test('dapat mendeteksi item yang sudah kadaluarsa', function () {
    $service = new InventoryService();

    // Item sudah kadaluarsa (tanggal di masa lalu)
    $expired = $service->isItemExpired('2023-01-01');
    expect($expired)->toBeTrue();

    // Item belum kadaluarsa (tanggal di masa depan)
    $notExpired = $service->isItemExpired('2030-01-01');
    expect($notExpired)->toBeFalse();
});

test('tanggal maintenance dihitung 6 bulan dari tanggal pembelian secara default', function () {
    $service = new InventoryService();

    // Maintenance 6 bulan setelah pembelian
    $maintenanceDate = $service->calculateMaintenanceDate('2025-01-15');
    expect($maintenanceDate)->toBe('2025-07-15');
});

test('periode maintenance bisa dikustomisasi', function () {
    $service = new InventoryService();

    // Maintenance 3 bulan setelah pembelian
    $maintenanceDate = $service->calculateMaintenanceDate('2025-01-15', 3);
    expect($maintenanceDate)->toBe('2025-04-15');

    // Maintenance 12 bulan setelah pembelian
    $maintenanceDate = $service->calculateMaintenanceDate('2025-01-15', 12);
    expect($maintenanceDate)->toBe('2026-01-15');
});
