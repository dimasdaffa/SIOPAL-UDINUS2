<?php

namespace App\Filament\Resources\SoftwareInventoryResource\Pages;

use App\Filament\Resources\SoftwareInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftwareInventories extends ListRecords
{
    protected static string $resource = SoftwareInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
