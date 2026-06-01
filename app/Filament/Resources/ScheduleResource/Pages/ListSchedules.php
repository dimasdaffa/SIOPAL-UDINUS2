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

    public function getSubheading(): ?string
    {
        $activePeriod = \App\Models\AcademicPeriod::getActive();
        if ($activePeriod) {
            return "Periode Aktif Saat Ini: " . $activePeriod->label;
        }
        return "Belum ada periode aktif. Harap atur periode aktif di menu Tahun Ajaran.";
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Jadwal'),
            Actions\Action::make('deleteAll')
                ->label('Hapus Jadwal Semester Ini')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Hapus Jadwal Semester Ini')
                ->modalDescription(function () {
                    $activePeriod = \App\Models\AcademicPeriod::getActive();
                    $label = $activePeriod ? $activePeriod->label : 'aktif';
                    $count = Schedule::where('academic_period_id', $activePeriod?->id)->count();
                    return "Anda akan menghapus {$count} jadwal pada periode \"{$label}\". Tindakan ini tidak dapat dibatalkan. Lanjutkan?";
                })
                ->modalSubmitActionLabel('Ya, Hapus')
                ->action(function () {
                    $activePeriodId = \App\Models\AcademicPeriod::getActiveId();
                    if ($activePeriodId) {
                        $count = Schedule::where('academic_period_id', $activePeriodId)->count();
                        Schedule::where('academic_period_id', $activePeriodId)->delete();

                        Notification::make()
                            ->title('Jadwal periode aktif berhasil dihapus')
                            ->body("Total {$count} jadwal pada periode aktif telah dihapus.")
                            ->success()
                            ->send();
                    }
                })
                ->visible(fn () => Schedule::where('academic_period_id', \App\Models\AcademicPeriod::getActiveId())->count() > 0),
        ];
    }
}
