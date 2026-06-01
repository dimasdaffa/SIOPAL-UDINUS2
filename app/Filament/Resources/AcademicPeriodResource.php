<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicPeriodResource\Pages;
use App\Models\AcademicPeriod;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class AcademicPeriodResource extends Resource
{
    protected static ?string $model = AcademicPeriod::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Penjadwalan';

    protected static ?string $modelLabel = 'Tahun Ajaran';

    protected static ?string $pluralModelLabel = 'Tahun Ajaran';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Periode Akademik')
                    ->description('Atur tahun ajaran dan semester')
                    ->schema([
                        Forms\Components\TextInput::make('tahun_ajaran')
                            ->label('Tahun Ajaran')
                            ->placeholder('2025/2026')
                            ->required()
                            ->maxLength(9)
                            ->regex('/^\d{4}\/\d{4}$/')
                            ->helperText('Format: YYYY/YYYY (contoh: 2025/2026)')
                            ->validationMessages([
                                'regex' => 'Format harus YYYY/YYYY, contoh: 2025/2026',
                            ]),

                        Forms\Components\Select::make('semester')
                            ->label('Semester')
                            ->options([
                                'ganjil' => 'Ganjil',
                                'genap' => 'Genap',
                            ])
                            ->required()
                            ->native(false),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Periode Aktif')
                            ->helperText('Hanya satu periode yang bisa aktif. Mengaktifkan periode ini akan menonaktifkan periode lainnya.')
                            ->default(false),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_ajaran')
                    ->label('Tahun Ajaran')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('semester')
                    ->label('Semester')
                    ->formatStateUsing(fn(string $state) => ucfirst($state))
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'ganjil' => 'info',
                        'genap' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray'),

                Tables\Columns\TextColumn::make('schedules_count')
                    ->label('Jumlah Jadwal')
                    ->counts('schedules')
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('semester')
                    ->options([
                        'ganjil' => 'Ganjil',
                        'genap' => 'Genap',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('activate')
                    ->label('Aktifkan')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Aktifkan Periode')
                    ->modalDescription(fn(AcademicPeriod $record) =>
                        "Apakah Anda yakin ingin mengaktifkan periode \"{$record->label}\"? Periode aktif sebelumnya akan dinonaktifkan.")
                    ->modalSubmitActionLabel('Ya, Aktifkan')
                    ->action(function (AcademicPeriod $record) {
                        $record->is_active = true;
                        $record->save();

                        Notification::make()
                            ->title('Periode berhasil diaktifkan')
                            ->body("Periode \"{$record->label}\" sekarang aktif.")
                            ->success()
                            ->send();
                    })
                    ->visible(fn(AcademicPeriod $record) => !$record->is_active),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn(AcademicPeriod $record) => !$record->is_active),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada periode akademik')
            ->emptyStateDescription('Klik tombol di bawah untuk membuat periode baru')
            ->emptyStateIcon('heroicon-o-academic-cap');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcademicPeriods::route('/'),
            'create' => Pages\CreateAcademicPeriod::route('/create'),
            'edit' => Pages\EditAcademicPeriod::route('/{record}/edit'),
        ];
    }
}
