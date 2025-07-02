<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangMasukResource\Pages;
use App\Filament\Resources\BarangMasukResource\RelationManagers;
use App\Models\BarangMasuk;
use App\Models\Laboratorium;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangMasukResource extends Resource
{
    protected static ?string $model = BarangMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static ?string $navigationLabel = 'Barang Masuk';

    protected static ?string $modelLabel = 'Barang Masuk';

    protected static ?string $pluralModelLabel = 'Barang Masuk';

    protected static ?string $slug = 'barang-masuk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Barang Masuk')
                    ->schema([
                        Forms\Components\Select::make('laboratorium_id')
                            ->label('Laboratorium')
                            ->options(Laboratorium::all()->pluck('ruang', 'id'))
                            ->searchable()
                            ->required()
                            ->live()
                            ->default(function () {
                                // Auto-fill berdasarkan URL parameter jika ada
                                $labId = request()->input('tableFilters.laboratorium.value')
                                    ?? request()->input('tableFilters')['laboratorium']['value'] ?? null;

                                if ($labId) {
                                    return (int) $labId;
                                }
                                return null;
                            })
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    // Ambil nama laboratorium
                                    $laboratorium = \App\Models\Laboratorium::find($state);
                                    $namaLab = $laboratorium ? strtoupper($laboratorium->ruang) : 'LAB';

                                    // Hitung nomor urut barang masuk untuk lab ini
                                    $existingCount = \App\Models\BarangMasuk::where('laboratorium_id', $state)
                                        ->whereNotNull('no_inventaris')
                                        ->count();

                                    $nomorUrut = str_pad($existingCount + 1, 3, '0', STR_PAD_LEFT);
                                    $tahun = date('Y');
                                    $bulan = date('m');

                                    // Set nomor inventaris yang akan di-generate
                                    $set('no_inventaris', "BM/{$namaLab}/{$tahun}/{$bulan}/{$nomorUrut}");
                                } else {
                                    $set('no_inventaris', null);
                                }
                            }),

                        Forms\Components\TextInput::make('no_inventaris')
                            ->label('Nomor Inventaris')
                            ->required()
                            ->maxLength(255)
                            ->extraAttributes(['style' => 'background-color: #f3f4f6; font-weight: 500;']),

                        Forms\Components\TextInput::make('nama_barang')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Barang'),

                        Forms\Components\TextInput::make('jumlah')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->label('Jumlah'),

                        Forms\Components\DatePicker::make('tanggal')
                            ->required()
                            ->default(now())
                            ->label('Tanggal Masuk'),

                        Forms\Components\Textarea::make('keterangan')
                            ->nullable()
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->label('Keterangan'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_inventaris')
                    ->searchable()
                    ->sortable()
                    ->label('Nomor Inventaris'),
                Tables\Columns\TextColumn::make('nama_barang')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Barang'),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable()
                    ->label('Jumlah'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable()
                    ->label('Tanggal Masuk'),
                Tables\Columns\TextColumn::make('laboratorium.ruang')
                    ->searchable()
                    ->sortable()
                    ->label('Laboratorium'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat Pada'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Diupdate Pada'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('laboratorium')
                    ->relationship('laboratorium', 'ruang')
                    ->label('Laboratorium'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangMasuks::route('/'),
            'create' => Pages\CreateBarangMasuk::route('/create'),
            'edit' => Pages\EditBarangMasuk::route('/{record}/edit'),
        ];
    }
}
