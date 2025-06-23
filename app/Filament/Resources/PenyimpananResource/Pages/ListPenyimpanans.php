<?php

namespace App\Filament\Resources\PenyimpananResource\Pages;

use App\Filament\Resources\PenyimpananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyimpanans extends ListRecords
{
    protected static string $resource = PenyimpananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
