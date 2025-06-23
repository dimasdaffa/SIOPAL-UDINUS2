<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporPtppResource\Pages;
use App\Filament\Resources\LaporPtppResource\Pages\Ptppskt;
use App\Filament\Resources\LaporPtppResource\RelationManagers;
use App\Models\lapor_ptpp;
use App\Models\LaporPtpp;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class LaporPtppResource extends Resource
{
    protected static ?string $model = lapor_ptpp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $slug = 'lapor-ptpp';

    protected static ?string $modelLabel = 'PTPP SKT';

    protected static ?string $navigationLabel = 'PTTP SKT';

    protected static ?string $navigationGroup = 'Pelaporan PTPP';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Textarea::make('nomor_sop')->label('Nomor SOP')->required(),
            Textarea::make('ketidaksesuaian')->label('Bentuk Ketidaksesuaian')->required(),
            TextInput::make('lokasi')->label('Lokasi')->required(),
            DatePicker::make('tgl_kejadian')->label('Tanggal Kejadian')->required(),
            TimePicker::make('jam_kejadian')->label('Jam Kejadian')->required(),
            DatePicker::make('tgl_laporan')->label('Tanggal Laporan')->required(),
            TimePicker::make('jam_laporan')->label('Jam Laporan')->required(),
            Textarea::make('hasil_pengamatan')->label('Hasil / Uraian Pengamatan Ketidaksesuaian / Potensi Ketidaksesuaian')->required(),
            Textarea::make('tindakan_langsung')->label('Tindakan Langsung')->required(),
            Textarea::make('permintaan_perbaikan')->label('Permintaan Tindakan Perbaikan dan Pencegahan')->required(),
            TextInput::make('nama_pelapor')->label('Nama Pelapor')->required(),
            TextInput::make('bagian_pelapor')->label('Bagian Pelapor')->required(),
            TextInput::make('jabatan_pelapor')->label('Jabatan Pelapor')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nomor_sop')->label('Nomor SOP')->sortable()->searchable(),
            TextColumn::make('ketidaksesuaian')->label('Bentuk Ketidaksesuaian')->sortable()->searchable(),
            TextColumn::make('lokasi')->label('Lokasi')->sortable()->searchable(),
            TextColumn::make('tgl_kejadian')->label('Tanggal Kejadian')->sortable(),
            TextColumn::make('jam_kejadian')->label('Jam Kejadian')->sortable(),
            TextColumn::make('tgl_laporan')->label('Tanggal Laporan')->sortable(),
            TextColumn::make('jam_laporan')->label('Jam Laporan')->sortable(),
            TextColumn::make('hasil_pengamatan')->label('Hasil / Uraian Pengamatan Ketidaksesuaian / Potensi Ketidaksesuaian')->sortable()->searchable(),
            TextColumn::make('tindakan_langsung')->label('Tindakan Langsung')->sortable()->searchable(),
            TextColumn::make('permintaan_perbaikan')->label('Permintaan Tindakan Perbaikan dan Pencegahan')->sortable()->searchable(),
            TextColumn::make('nama_pelapor')->label('Nama Pelapor')->sortable()->searchable(),
            TextColumn::make('bagian_pelapor')->label('Bagian Pelapor')->sortable()->searchable(),
            TextColumn::make('jabatan_pelapor')->label('Jabatan Pelapor')->sortable()->searchable(),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('view_pdf')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->url(fn (lapor_ptpp $record): string => route('admin.perbaikan_pencegahan', $record->id))
                    ->openUrlInNewTab(),

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
            'index' => Pages\ListLaporPtpps::route('/'),
            // 'create' => Pages\CreateLaporPtpp::route('/create'),
            // 'edit' => Pages\EditLaporPtpp::route('/{record}/edit'),
        ];
    }
}
