<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\AllHardware;
use App\Filament\Resources\HeadphoneResource\Pages;
use App\Filament\Resources\HeadphoneResource\RelationManagers;
use App\Models\Headphone;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeadphoneResource extends Resource
{
    protected static ?string $model = Headphone::class;

    protected static ?string $navigationIcon = 'fluentui-headphones-24';

    protected static ?string $slug = 'headphone';

    protected static ?string $navigationLabel = 'Headphone';

    protected static ?string $modelLabel = 'Headphone';

    protected static ?string $navigationGroup = 'Data Hardware';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_inventaris')
                    ->label('No Inventaris')
                    ->disabled() // Dibuat otomatis di model
                    ->dehydrated(false), // Tidak dikirim ke backend karena sudah otomatis

                TextInput::make('merk')
                    ->label('Merk')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nama')
                    ->label('Tipe')
                    ->required()
                    ->maxLength(255),

                Textarea::make('spesifikasi')
                    ->label('Spesifikasi')
                    ->rows(4)
                    ->maxLength(500),

                Select::make('tahun')
                    ->label('Tahun')
                    ->options(function () {
                        $tahunSekarang = date('Y');
                        return array_combine(
                            range($tahunSekarang, $tahunSekarang - 20),
                            range($tahunSekarang, $tahunSekarang - 20)
                        );
                    })
                    ->required(),

                Select::make('bulan')
                    ->label('Bulan Pengadaan')
                    ->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ]),
                TextInput::make('stok')
                    ->label('Stok')
                    ->required()
                    ->minValue(0)
                    ->default(0)
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_inventaris')
                    ->label('No Inventaris')
                    ->searchable(),

                TextColumn::make('merk')
                    ->label('Merk')
                    ->searchable(),

                TextColumn::make('nama')
                    ->label('Tipe')
                    ->searchable(),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('tahun')
                    ->label('Filter Tahun')
                    ->options(function () {
                        $tahunSekarang = date('Y');
                        return array_combine(
                            range($tahunSekarang, $tahunSekarang - 20),
                            range($tahunSekarang, $tahunSekarang - 20)
                        );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListHeadphones::route('/'),
            'create' => Pages\CreateHeadphone::route('/create'),
            'edit' => Pages\EditHeadphone::route('/{record}/edit'),
        ];
    }
}
