<?php

namespace App\Exports;

use App\Models\Borrow;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BorrowsExport implements FromView, WithStyles, ShouldAutoSize
{
    public function Styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('borrow.export_excel', [
            'borrows' => Borrow::all()
        ]);
    }
}
