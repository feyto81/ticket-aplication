<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Transaction;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DayTransactionExport implements FromView
{

    use Exportable;
    public function view(): view
    {
        return view('backend.report.index', [
            'data' => Transaction::all()
        ]);
    }
}
