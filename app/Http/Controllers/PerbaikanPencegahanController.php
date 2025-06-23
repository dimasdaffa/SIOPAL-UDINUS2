<?php

namespace App\Http\Controllers;

use App\Models\lapor_ptpp;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PerbaikanPencegahanController extends Controller
{
    /**
     * Display the PDF for a specific PTPP record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewPDF($id)
    {
        // Ambil data PTPP berdasarkan ID
        $ptpp = lapor_ptpp::findOrFail($id);

        // Generate PDF
        return view('admin.perbaikan_pencegahan', ['ptpp' => $ptpp]);
    }

    /**
     * Download the PDF for a specific PTPP record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        // Ambil data PTPP berdasarkan ID
        $ptpp = lapor_ptpp::findOrFail($id);

        // Generate PDF
        $pdf = PDF::loadView('admin.perbaikan_pencegahan', ['ptpp' => $ptpp]);

        // Atur paper size dan orientasi
        $pdf->setPaper('A4', 'portrait');

        // Tentukan nama file yang akan di-download
        $filename = 'PTPP_' . $ptpp->id . '_' . date('Ymd') . '.pdf';

        // Return PDF untuk didownload
        return $pdf->download($filename);
    }

    /**
     * Preview PDF for testing purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function previewPDF()
    {
        // Ambil PTPP terbaru untuk preview
        $ptpp = lapor_ptpp::latest()->first();

        if (!$ptpp) {
            // Jika tidak ada data, buat sample data
            $ptpp = new lapor_ptpp();
            $ptpp->nomor_sop = 'SOP-LAB-001';
            $ptpp->ketidaksesuaian = 'Contoh Ketidaksesuaian';
            $ptpp->lokasi = 'Laboratorium Komputer';
            $ptpp->tgl_kejadian = date('Y-m-d');
            $ptpp->jam_kejadian = date('H:i');
            $ptpp->tgl_laporan = date('Y-m-d');
            $ptpp->jam_laporan = date('H:i');
            $ptpp->hasil_pengamatan = 'Contoh hasil pengamatan ketidaksesuaian yang ditemukan pada laboratorium.';
            $ptpp->tindakan_langsung = 'Contoh tindakan langsung yang dilakukan untuk mengatasi masalah sementara.';
            $ptpp->permintaan_perbaikan = 'Contoh permintaan tindakan perbaikan dan pencegahan yang diusulkan untuk jangka panjang.';
            $ptpp->nama_pelapor = 'John Doe';
            $ptpp->bagian_pelapor = 'IT';
            $ptpp->jabatan_pelapor = 'Staff';
        }

        // Generate PDF
        // $pdf = PDF::loadView('admin.perbaikan_pencegahan', ['ptpp' => $ptpp]);

        // Atur paper size dan orientasi
        // $pdf->setPaper('A4', 'portrait');

        // Return PDF untuk preview
        return view('admin.perbaikan_pencegahan', ['ptpp' => $ptpp]);
    }
}
