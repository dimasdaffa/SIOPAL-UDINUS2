<?php

namespace App\Filament\Resources\LaporPtppResource\Pages;

use App\Filament\Resources\LaporPtppResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporPtpp extends EditRecord
{
    protected static string $resource = LaporPtppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
