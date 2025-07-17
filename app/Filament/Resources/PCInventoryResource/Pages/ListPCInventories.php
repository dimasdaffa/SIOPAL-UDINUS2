<?php

namespace App\Filament\Resources\PCInventoryResource\Pages;

use App\Filament\Resources\PCInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PCInventoriesExport;
use Illuminate\Database\Eloquent\Builder;

class ListPCInventories extends ListRecords
{
    protected static string $resource = PCInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /**
     * Filter records based on user's lab permissions
     */
    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        // Super admin can see all labs, no filtering needed
        if (auth()->user()->hasRole('super_admin')) {
            return $query;
        }

        // For regular users, filter by authorized labs
        $authorizedLabIds = auth()->user()->getAuthorizedLabIds('view');
        return $query->whereIn('laboratorium_id', $authorizedLabIds);
    }

    /**
     * Metode ini akan menangani logika download file Excel.
     */
    public function exportToExcel()
    {
        // Ambil nilai filter laboratorium yang sedang aktif dari properti public $tableFilters
        $labId = $this->tableFilters['laboratorium']['value'] ?? null;

        $fileName = 'Inventaris PC Detail - ' . date('Y-m-d') . '.xlsx';

        // Panggil Maatwebsite Excel untuk men-download file
        return Excel::download(new PCInventoriesExport($labId), $fileName);
    }
}
