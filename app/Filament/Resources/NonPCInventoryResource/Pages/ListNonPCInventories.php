<?php

namespace App\Filament\Resources\NonPCInventoryResource\Pages;

use App\Filament\Resources\NonPCInventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNonPCInventories extends ListRecords
{
    protected static string $resource = NonPCInventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
