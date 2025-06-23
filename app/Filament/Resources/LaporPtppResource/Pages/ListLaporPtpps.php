<?php

namespace App\Filament\Resources\LaporPtppResource\Pages;

use App\Filament\Resources\LaporPtppResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporPtpps extends ListRecords
{
    protected static string $resource = LaporPtppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
