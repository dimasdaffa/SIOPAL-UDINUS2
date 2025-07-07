<?php

namespace App\Filament\Resources\NonPCInventoryResource\Pages;

use App\Filament\Resources\NonPCInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NonPCInventoriesExport;

class ListNonPCInventories extends ListRecords
{
    protected static string $resource = NonPCInventoryResource::class;

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

        $fileName = 'Inventaris Non-PC Detail - ' . date('Y-m-d') . '.xlsx';

        // Panggil Maatwebsite Excel untuk men-download file
        return Excel::download(new NonPCInventoriesExport($labId), $fileName);
    }
}
