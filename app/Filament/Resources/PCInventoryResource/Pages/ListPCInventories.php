<?php

namespace App\Filament\Resources\PCInventoryResource\Pages;

use App\Filament\Resources\PCInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPCInventories extends ListRecords
{
    protected static string $resource = PCInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
