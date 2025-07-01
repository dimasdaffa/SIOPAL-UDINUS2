<?php

namespace App\Filament\Resources\SoftwareInventoryResource\Pages;

use App\Filament\Resources\SoftwareInventoryResource;
use App\Models\SoftwareDetail;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSoftwareInventory extends CreateRecord
{
    protected static string $resource = SoftwareInventoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil lab ID dari URL parameter jika ada
        $labId = request()->get('tableFilters')['laboratorium']['value'] ?? null;

        if ($labId) {
            $data['laboratorium_id'] = $labId;
        }

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $detailsData = $data['details'];
        unset($data['details']);

        $softwareDetail = SoftwareDetail::create($detailsData);

        $data['inventoriable_id'] = $softwareDetail->id;
        $data['inventoriable_type'] = SoftwareDetail::class;

        return static::getModel()::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
