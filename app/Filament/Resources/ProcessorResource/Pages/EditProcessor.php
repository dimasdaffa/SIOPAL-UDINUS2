<?php

namespace App\Filament\Resources\ProcessorResource\Pages;

use App\Filament\Resources\ProcessorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcessor extends EditRecord
{
    protected static string $resource = ProcessorResource::class;

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
