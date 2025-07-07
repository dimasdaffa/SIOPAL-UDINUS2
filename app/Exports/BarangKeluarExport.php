<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangKeluarExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public ?int $laboratorium_id;

    public function __construct(?int $laboratorium_id = null)
    {
        $this->laboratorium_id = $laboratorium_id;
    }

    public function query()
    {
        $query = BarangKeluar::query()->with(['laboratorium']);

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
            'Tanggal Keluar',
            'Laboratorium',
            'Keterangan'
        ];
    }

    public function map($barangKeluar): array
    {
        return [
            $barangKeluar->no_inventaris ?? 'N/A',
            $barangKeluar->nama_barang,
            $barangKeluar->jumlah,
            $barangKeluar->tanggal ? \Carbon\Carbon::parse($barangKeluar->tanggal)->format('d-m-Y') : 'N/A',
            $barangKeluar->laboratorium->ruang ?? 'N/A',
            $barangKeluar->keterangan ?? 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
