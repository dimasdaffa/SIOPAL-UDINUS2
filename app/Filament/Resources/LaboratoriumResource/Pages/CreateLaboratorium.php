<?php

namespace App\Filament\Resources\LaboratoriumResource\Pages;

use App\Filament\Resources\LaboratoriumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaboratorium extends CreateRecord
{
    protected static string $resource = LaboratoriumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
