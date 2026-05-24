<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use App\Models\Schedule;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use Filament\Notifications\Notification;

class ListSchedules extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Jadwal'),
            Actions\Action::make('deleteAll')
                ->label('Hapus Semua Jadwal')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Hapus Semua Jadwal')
                ->modalDescription(function () {
                    $count = Schedule::count();
                    return "Anda akan menghapus {$count} jadwal. Tindakan ini tidak dapat dibatalkan. Lanjutkan?";
                })
                ->modalSubmitActionLabel('Ya, Hapus Semua')
                ->action(function () {
                    $count = Schedule::count();
                    Schedule::truncate();

                    Notification::make()
                        ->title('Semua jadwal berhasil dihapus')
                        ->body("Total {$count} jadwal telah dihapus.")
                        ->success()
                        ->send();
                })
                ->visible(fn () => Schedule::count() > 0),
        ];
    }
}
