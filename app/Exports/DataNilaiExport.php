<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Siswa;

class DataNilaiExport implements FromView, WithHeadings
{
    /**
     * Get the view that will be used to render the exported file.
     *
     * @return View
     */
    public function view(): View
    {
        $siswa = Siswa::with('game')->get();
        return view('exports.data_nilai', compact('siswa'));
    }

    /**
     * Set the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'NIS Siswa',
            'Nama Siswa',
            'Kategori Game',
            'Nilai',
            'Dari Jumlah Soal',
            'Dibuat',
        ];
    }
}
