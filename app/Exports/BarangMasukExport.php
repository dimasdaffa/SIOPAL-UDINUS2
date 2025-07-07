<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangMasukExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public ?int $laboratorium_id;

    public function __construct(?int $laboratorium_id = null)
    {
        $this->laboratorium_id = $laboratorium_id;
    }

    public function query()
    {
        $query = BarangMasuk::query()->with(['laboratorium']);

        if ($this->laboratorium_id) {
            $query->where('laboratorium_id', $this->laboratorium_id);
        }

        return $query->orderBy('tanggal', 'desc');
    }

    public function headings(): array
    {
        return [
            'No Inventaris',
            'Nama Barang',
            'Jumlah',
            'Tanggal Masuk',
            'Laboratorium',
            'Keterangan'
        ];
    }

    public function map($barangMasuk): array
    {
        return [
            $barangMasuk->no_inventaris ?? 'N/A',
            $barangMasuk->nama_barang,
            $barangMasuk->jumlah,
            $barangMasuk->tanggal ? \Carbon\Carbon::parse($barangMasuk->tanggal)->format('d-m-Y') : 'N/A',
            $barangMasuk->laboratorium->ruang ?? 'N/A',
            $barangMasuk->keterangan ?? 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
