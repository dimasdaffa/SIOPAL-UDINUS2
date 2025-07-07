<?php

namespace App\Exports;

use App\Models\Inventory;
use App\Models\SoftwareDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SoftwareInventoriesExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public ?int $laboratorium_id;

    public function __construct(?int $laboratorium_id = null)
    {
        $this->laboratorium_id = $laboratorium_id;
    }

    public function query()
    {
        $query = Inventory::query()
            ->with(['laboratorium', 'inventoriable'])
            ->where('inventoriable_type', SoftwareDetail::class);

        if ($this->laboratorium_id) {
            $query->where('laboratorium_id', $this->laboratorium_id);
        }

        return $query->orderBy('laboratorium_id')->orderBy('kode_inventaris');
    }

    public function headings(): array
    {
        return [
            'No Inventaris',
            'Laboratorium',
            'Kondisi',
            'Tanggal Pengadaan',
            'Nama Software',
            'Versi',
            'Jenis Lisensi',
            'Nomor Lisensi',
            'Tanggal Kadaluarsa',
            'Keterangan'
        ];
    }

    public function map($inventory): array
    {
        return [
            $inventory->kode_inventaris,
            $inventory->laboratorium->ruang ?? 'N/A',
            $inventory->kondisi,
            $inventory->tanggal_pengadaan ? \Carbon\Carbon::parse($inventory->tanggal_pengadaan)->format('d-m-Y') : 'N/A',
            $inventory->inventoriable?->nama ?? 'N/A',
            $inventory->inventoriable?->versi ?? 'N/A',
            $inventory->inventoriable?->jenis_lisensi ?? 'N/A',
            $inventory->inventoriable?->nomor_lisensi ?? 'N/A',
            $inventory->inventoriable?->tanggal_kadaluarsa ? \Carbon\Carbon::parse($inventory->inventoriable?->tanggal_kadaluarsa)->format('d-m-Y') : 'N/A',
            $inventory->inventoriable?->keterangan ?? 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
