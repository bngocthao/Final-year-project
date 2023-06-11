<?php

namespace App\Exports;

use Maatwebsite\Excel\Facades\Excel;
class InvoicesExport implements FromView
{
    public function view()
    {
        return view('invoices.export', [
            'invoices' => App\Invoice::all()
        ]);
    }
}
