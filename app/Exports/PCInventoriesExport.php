<?php

namespace App\Exports;

use App\Models\Inventory;
use App\Models\PCDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PCInventoriesExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public ?int $laboratorium_id;

    public function __construct(?int $laboratorium_id = null)
    {
        $this->laboratorium_id = $laboratorium_id;
    }

    public function query()
    {
        $query = Inventory::query()
            ->with([
                'laboratorium', 'inventoriable.processor', 'inventoriable.motherboard',
                'inventoriable.ram', 'inventoriable.penyimpanan', 'inventoriable.vga',
                'inventoriable.psu', 'inventoriable.keyboard', 'inventoriable.mouse',
                'inventoriable.monitor', 'inventoriable.dvd', 'inventoriable.headphone',
            ])
            ->where('inventoriable_type', PCDetail::class);

        if ($this->laboratorium_id) {
            $query->where('laboratorium_id', $this->laboratorium_id);
        }

        return $query->orderBy('laboratorium_id')->orderBy('kode_inventaris');
    }

    public function headings(): array
    {
        return [
            'No Inventaris', 'Laboratorium', 'Kondisi', 'Tanggal Pengadaan', 'Processor',
            'Motherboard', 'RAM', 'Penyimpanan', 'VGA', 'PSU', 'Keyboard',
            'Mouse', 'Monitor', 'DVD (Opsional)', 'Headphone (Opsional)',
        ];
    }

    public function map($inventory): array
    {
        return [
            $inventory->kode_inventaris,
            $inventory->laboratorium->ruang ?? 'N/A',
            $inventory->kondisi,
            $inventory->tanggal_pengadaan ? \Carbon\Carbon::parse($inventory->tanggal_pengadaan)->format('d-m-Y') : 'N/A',
            $inventory->inventoriable?->processor?->full_name ?? 'N/A',
            $inventory->inventoriable?->motherboard?->full_name ?? 'N/A',
            $inventory->inventoriable?->ram?->full_name ?? 'N/A',
            $inventory->inventoriable?->penyimpanan?->full_name ?? 'N/A',
            $inventory->inventoriable?->vga?->full_name ?? 'N/A',
            $inventory->inventoriable?->psu?->full_name ?? 'N/A',
            $inventory->inventoriable?->keyboard?->full_name ?? 'N/A',
            $inventory->inventoriable?->mouse?->full_name ?? 'N/A',
            $inventory->inventoriable?->monitor?->full_name ?? 'N/A',
            $inventory->inventoriable?->dvd?->full_name ?? '-',
            $inventory->inventoriable?->headphone?->full_name ?? '-',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
