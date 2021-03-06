<?php

namespace App\Imports;

use App\Models\ExcelModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportModel implements ToModel, WithHeadingRow
{

    private $idWork;

    public function __construct( int $idWork)
    {
        $this->idWork = $idWork;
    }

    public function model(array $row)
    {

        return new ExcelModel([

            'system' => $row['numero_del_caso'],
            'employee' => $row['numero_documento_na'],
            'company' => $row['numero_de_documento'],
            'state' => $row['estado'],
            'idWork' => $this->idWork
        ]);
    }
}
