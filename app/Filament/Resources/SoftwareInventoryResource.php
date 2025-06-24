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
                            ->searchable(),
                        TextInput::make('kode_inventaris')
                            ->label('Kode Inventaris')
                            ->required()
                            ->unique(table: Inventory::class, column: 'kode_inventaris', ignoreRecord: true),
                        TextInput::make('nama_barang')
                            ->label('Nama Software')
                            ->required(),
                        DatePicker::make('tanggal_pengadaan'),
                        Select::make('kondisi')
                            ->options(['Baik' => 'Baik', 'Rusak Ringan' => 'Rusak Ringan', 'Rusak Berat' => 'Rusak Berat', 'Dalam Perbaikan' => 'Dalam Perbaikan'])
                            ->required()
                            ->default('Baik'),
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
