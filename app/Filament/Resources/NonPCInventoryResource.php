<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NonPCInventoryResource\Pages;
use App\Models\Inventory;
use App\Models\NonPCDetail;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NonPCInventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $modelLabel = 'Inventaris Non-PC';
    protected static ?string $pluralModelLabel = 'Inventaris Non-PC';
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static bool $shouldRegisterNavigation = false;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('inventoriable_type', NonPCDetail::class);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Umum Barang')
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
                            ->label('Nama Barang')
                            ->required(),
                        DatePicker::make('tanggal_pengadaan'),
                        Select::make('kondisi')
                            ->options(['Baik' => 'Baik', 'Rusak Ringan' => 'Rusak Ringan', 'Rusak Berat' => 'Rusak Berat', 'Dalam Perbaikan' => 'Dalam Perbaikan'])
                            ->required()
                            ->default('Baik'),
                    ])->columns(2),

                Section::make('Detail Barang')
                    ->schema([
                        TextInput::make('details.merk')->label('Merk'),
                        TextInput::make('details.model')->label('Model/Tipe'),
                        Textarea::make('details.spesifikasi')
                            ->label('Spesifikasi Tambahan')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_inventaris')->searchable()->sortable(),
                TextColumn::make('nama_barang')->searchable(),
                TextColumn::make('inventoriable.merk')->label('Merk')->toggleable(),
                TextColumn::make('laboratorium.ruang')->sortable()->badge(),
                TextColumn::make('kondisi')->sortable()->badge()->color(fn (string $state): string => match ($state) {
                    'Baik' => 'success',
                    'Rusak Ringan' => 'warning',
                    'Rusak Berat' => 'danger',
                    'Dalam Perbaikan' => 'info',
                }),
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
            'index' => Pages\ListNonPCInventories::route('/'),
            'create' => Pages\CreateNonPCInventory::route('/create'),
            'edit' => Pages\EditNonPCInventory::route('/{record}/edit'),
        ];
    }
}
