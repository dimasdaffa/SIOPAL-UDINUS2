<?php

namespace App\Filament\Resources\SoftwareInventoryResource\Pages;

use App\Filament\Resources\SoftwareInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSoftwareInventory extends EditRecord
{
    protected static string $resource = SoftwareInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load data dari relasi inventoriable ke dalam form details
        if ($this->record->inventoriable) {
            $data['details'] = $this->record->inventoriable->toArray();
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $detailsData = $data['details'] ?? [];
        unset($data['details']);

        // Update data pada tabel software_details
        if ($record->inventoriable && !empty($detailsData)) {
            $record->inventoriable->update($detailsData);
        }

        // Update data pada tabel inventories
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
