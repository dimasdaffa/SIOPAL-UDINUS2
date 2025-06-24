<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SoftwareInventoryResource\Pages;
use App\Models\Inventory;
use App\Models\SoftwareDetail;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SoftwareInventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $modelLabel = 'Inventaris Software';
    protected static ?string $pluralModelLabel = 'Inventaris Software';
    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';

    protected static bool $shouldRegisterNavigation = false;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('inventoriable_type', SoftwareDetail::class);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Umum Software')
                    ->schema([
                        Select::make('laboratorium_id')
                            ->label('Laboratorium')
                            ->relationship('laboratorium', 'ruang')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    // Ambil nama laboratorium
                                    $laboratorium = \App\Models\Laboratorium::find($state);
                                    $namaLab = $laboratorium ? strtoupper($laboratorium->ruang) : 'LAB';

                                    // Hitung nomor urut Software untuk lab ini
                                    $existingSoftware = \App\Models\Inventory::where('laboratorium_id', $state)
                                        ->where('inventoriable_type', 'App\Models\SoftwareDetail')
                                        ->whereNotNull('kode_inventaris')
                                        ->count();

                                    $nomorUrut = str_pad($existingSoftware + 1, 2, '0', STR_PAD_LEFT);

                                    // Set nomor inventaris yang akan di-generate
                                    $set('preview_kode_inventaris', "UDN/LABKOM/INV/SOFTWARE/{$namaLab}/{$nomorUrut}");
                                } else {
                                    $set('preview_kode_inventaris', null);
                                }
                            }),
                        TextInput::make('preview_kode_inventaris')
                            ->label('No Inventaris (Preview)')
                            ->disabled()
                            ->dehydrated(false)
                            ->placeholder('Pilih laboratorium terlebih dahulu')
                            ->helperText('Nomor inventaris yang akan di-generate otomatis')
                            ->extraAttributes(['style' => 'background-color: #f3f4f6; font-weight: 500;']),
                        TextInput::make('nama_barang')
                            ->label('Nama Software')
                            ->required(),
                    ])->columns(2),

                Section::make('Detail Lisensi')
                    ->schema([
                        TextInput::make('details.jenis_lisensi')->label('Jenis Lisensi (Contoh: Freeware, Perpetual, Subscription)'),
                        TextInput::make('details.nomor_lisensi')->label('Nomor Lisensi / Kunci Produk'),
                        DatePicker::make('details.tanggal_kadaluarsa')->label('Tanggal Kadaluarsa (jika ada)'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_inventaris')->searchable()->sortable(),
                TextColumn::make('nama_barang')->label('Nama Software')->searchable(),
                TextColumn::make('inventoriable.jenis_lisensi')->label('Lisensi')->toggleable(),
                TextColumn::make('laboratorium.ruang')->sortable()->badge(),
            ])
            ->filters([
                SelectFilter::make('laboratorium')
                    ->relationship('laboratorium', 'ruang')
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function (Inventory $record) {
                        $record->inventoriable?->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->before(function($records){
                        $records->each(fn(Inventory $record) => $record->inventoriable?->delete());
                    }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoftwareInventories::route('/'),
            'create' => Pages\CreateSoftwareInventory::route('/create'),
            'edit' => Pages\EditSoftwareInventory::route('/{record}/edit'),
        ];
    }
}
