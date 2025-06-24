<?php

namespace App\Filament\Resources\PCInventoryResource\Pages;

use App\Filament\Resources\PCInventoryResource;
use App\Models\PCDetail;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePCInventory extends CreateRecord
{
    protected static string $resource = PCInventoryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // 1. Ambil data detail dari form
        $detailsData = $data['details'];
        unset($data['details']); // Hapus dari data utama

        // 2. Buat record di tabel pc_details
        $pcDetail = PCDetail::create($detailsData);

        // 3. Kaitkan record pc_details ke data inventaris utama
        $data['inventoriable_id'] = $pcDetail->id;
        $data['inventoriable_type'] = PCDetail::class;

        // 4. Buat record inventaris
        return static::getModel()::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
