<?php

namespace App\Filament\Resources\BarangKeluarResource\Pages;

use App\Filament\Resources\BarangKeluarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangKeluarExport;

class ListBarangKeluars extends ListRecords
{
    protected static string $resource = BarangKeluarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /**
     * Metode ini akan menangani logika download file Excel.
     */
    public function exportToExcel()
    {
        // Ambil nilai filter laboratorium yang sedang aktif dari properti public $tableFilters
        $labId = $this->tableFilters['laboratorium']['value'] ?? null;

        $fileName = 'Data Barang Keluar - ' . date('Y-m-d') . '.xlsx';

        // Panggil Maatwebsite Excel untuk men-download file
        return Excel::download(new BarangKeluarExport($labId), $fileName);
    }
}
