<?php

namespace App\Exports;

use App\Models\Inventory;
use App\Models\NonPCDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NonPCInventoriesExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
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
            ->where('inventoriable_type', NonPCDetail::class);

        if ($this->laboratorium_id) {
            $query->where('laboratorium_id', $this->laboratorium_id);
        }

        return $query->orderBy('laboratorium_id')->orderBy('kode_inventaris');
    }

    public function headings(): array
    {
        return [
            'No Inventaris',
            'Nama Barang',
            'Laboratorium',
            'Kondisi',
            'Tanggal Pengadaan',
            'Merk',
            'Model/Tipe',
            'Spesifikasi'
        ];
    }

    public function map($inventory): array
    {
        return [
            $inventory->kode_inventaris,
            $inventory->nama_barang,
            $inventory->laboratorium->ruang ?? 'N/A',
            $inventory->kondisi,
            $inventory->tanggal_pengadaan ? \Carbon\Carbon::parse($inventory->tanggal_pengadaan)->format('d-m-Y') : 'N/A',
            $inventory->inventoriable?->merk ?? 'N/A',
            $inventory->inventoriable?->model ?? 'N/A',
            $inventory->inventoriable?->spesifikasi ?? 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
