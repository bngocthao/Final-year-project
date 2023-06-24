<?php

namespace App\Exports;

use App\Models\PostponeApplication;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormExport implements FromCollection
{
    public function collection()
    {
        return PostponeApplication::all();
    }
}
