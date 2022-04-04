<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Work extends Model
{
    use HasFactory;

    protected $table = "work";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function workExcel(){
        $array = [];
        foreach(
        DB::select('
        SELECT excel.* FROM work
        INNER JOIN excel
        ON excel.idWork = work.id
        WHERE work.id = ?;
        ',
        [$this->id]) as $sql)
        {
            array_push($array, $sql);
        }
        return $array;
    }
}
