<?php

namespace App\Filament\Resources\KlasifikasiLabResource\Pages;

use App\Filament\Resources\KlasifikasiLabResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKlasifikasiLabs extends ListRecords
{
    protected static string $resource = KlasifikasiLabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
