<?php

namespace App\Filament\Resources\NonPCInventoryResource\Pages;

use App\Filament\Resources\NonPCInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditNonPCInventory extends EditRecord
{
    protected static string $resource = NonPCInventoryResource::class;

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
