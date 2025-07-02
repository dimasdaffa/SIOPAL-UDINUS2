<?php

namespace App\Filament\Resources\BarangMasukResource\Pages;

use App\Filament\Resources\BarangMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBarangMasuk extends CreateRecord
{
    protected static string $resource = BarangMasukResource::class;

    protected function getRedirectUrl(): string
    {
        // Ambil ID laboratorium dari record yang baru dibuat
        $labId = $this->record->laboratorium_id;

        // Redirect ke halaman index dengan filter laboratorium yang sesuai
        return $this->getResource()::getUrl('index', [
            'tableFilters' => [
                'laboratorium' => [
                    'value' => $labId
                ]
            ]
        ]);
    }
}
