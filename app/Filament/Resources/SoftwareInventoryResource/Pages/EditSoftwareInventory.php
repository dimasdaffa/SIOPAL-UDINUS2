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

    protected function fillForm(): void
    {
        parent::fillForm();
        $this->form->fill(['details' => $this->record->inventoriable->toArray()]);
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $detailsData = $data['details'];
        unset($data['details']);

        $record->inventoriable->update($detailsData);
        $record->update($data);

        return $record;
    }
}
