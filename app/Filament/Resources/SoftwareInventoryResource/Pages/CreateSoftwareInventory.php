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
