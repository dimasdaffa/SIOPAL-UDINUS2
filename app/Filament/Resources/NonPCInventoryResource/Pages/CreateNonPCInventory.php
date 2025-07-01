<?php

namespace App\Filament\Resources\NonPCInventoryResource\Pages;

use App\Filament\Resources\NonPCInventoryResource;
use App\Models\NonPCDetail;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateNonPCInventory extends CreateRecord
{
    protected static string $resource = NonPCInventoryResource::class;

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

        $nonPcDetail = NonPCDetail::create($detailsData);

        $data['inventoriable_id'] = $nonPcDetail->id;
        $data['inventoriable_type'] = NonPCDetail::class;

        return static::getModel()::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
