<?php

namespace App\Filament\Resources\KlasifikasiLabResource\Pages;

use App\Filament\Resources\KlasifikasiLabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKlasifikasiLab extends EditRecord
{
    protected static string $resource = KlasifikasiLabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
