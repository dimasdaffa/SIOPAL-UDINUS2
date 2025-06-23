<?php

namespace App\Filament\Resources\KlasifikasiLabResource\Pages;

use App\Filament\Resources\KlasifikasiLabResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKlasifikasiLab extends CreateRecord
{
    protected static string $resource = KlasifikasiLabResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
