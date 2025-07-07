<?php

namespace App\Filament\Resources\SoftwareInventoryResource\Pages;

use App\Filament\Resources\SoftwareInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SoftwareInventoriesExport;

class ListSoftwareInventories extends ListRecords
{
    protected static string $resource = SoftwareInventoryResource::class;

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

        $fileName = 'Inventaris Software - ' . date('Y-m-d') . '.xlsx';

        // Panggil Maatwebsite Excel untuk men-download file
        return Excel::download(new SoftwareInventoriesExport($labId), $fileName);
    }
}
