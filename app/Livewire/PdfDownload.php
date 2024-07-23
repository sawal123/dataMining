<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\PDF;


class PdfDownload extends Component
{
    public function render()
    {
        return view('livewire.pdf-download');
    }

    public function downloadPdf()
    {
        $data = [
            // Data yang ingin Anda sertakan dalam PDF
            'items' => $this->getFinalResults(),
        ];

        $pdf = PDF::loadView('pdf.report', $data);
        return $pdf->download('report.pdf');
    }

    private function getFinalResults()
    {
        // Fungsi untuk mendapatkan data hasil akhir
        // Sesuaikan dengan data yang ingin Anda masukkan ke dalam PDF
        return [
            ['nama_barang' => 'Example Item', 'cluster' => 'C1', 'keterangan' => 'Sangat Laris'],
            // Tambahkan data lainnya di sini
        ];
    }
}
