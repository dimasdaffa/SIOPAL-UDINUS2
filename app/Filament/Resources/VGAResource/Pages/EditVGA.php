<?php

namespace App\Filament\Resources\VGAResource\Pages;

use App\Filament\Resources\VGAResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVGA extends EditRecord
{
    protected static string $resource = VGAResource::class;

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
