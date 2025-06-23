<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaboratoriumResource\Pages;
use App\Filament\Resources\LaboratoriumResource\RelationManagers;
use App\Models\Laboratorium;
use Filament\Forms;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaboratoriumResource extends Resource
{
    protected static ?string $model = Laboratorium::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $slug = 'laboratorium';

    protected static ?string $navigationLabel = 'Data Laboratorium';

    protected static ?string $navigationGroup = 'MASTER DATA';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama_kategori')
                    ->required()
                    ->preload() //agar option select bisa muncul
                    ->searchable()
                    ->placeholder('Select kategori'),

                TextInput::make('ruang')
                    ->label('Ruang Laboratorium')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kapasitas')
                    ->label('Kapasitas Ruangan')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                TextInput::make('pc_siap')
                    ->label('PC Siap Pakai')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                TextInput::make('pc_backup')
                    ->label('PC Backup')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(4)
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ruang')
                    ->label('Ruang Laboratorium')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori Laboratorium')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kapasitas')
                    ->label('Kapasitas')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('kategori_id')
                    ->label('Filter Kategori')
                    ->relationship('kategori', 'nama_kategori'),
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
            'index' => Pages\ListLaboratoria::route('/'),
            // 'create' => Pages\CreateLaboratorium::route('/create'),
            // 'edit' => Pages\EditLaboratorium::route('/{record}/edit'),
        ];
    }
}
