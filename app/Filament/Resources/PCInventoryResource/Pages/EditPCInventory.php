<?php

namespace App\Filament\Resources\PCInventoryResource\Pages;

use App\Filament\Resources\PCInventoryResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditPCInventory extends EditRecord
{
    protected static string $resource = PCInventoryResource::class;

    protected function fillForm(): void
    {
        parent::fillForm();
        // Mengisi form 'details' dengan data dari relasi inventoriable
        $this->form->fill(['details' => $this->record->inventoriable->toArray()]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // 1. Ambil data detail dari form
        $detailsData = $data['details'];
        unset($data['details']); // Hapus dari data utama

        // 2. Update record inventoriable (pc_details)
        $record->inventoriable->update($detailsData);

        // 3. Update record inventaris utama
        $record->update($data);

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        // Ambil ID laboratorium dari record yang baru diupdate
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
