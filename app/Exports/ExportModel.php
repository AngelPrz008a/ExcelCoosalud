<?php

namespace App\Exports;

use App\Models\ExcelModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportModel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelModel::all();
    }
}
