<?php

namespace App\Imports;

use App\Models\_class_timetable_copy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRaw;

class ClasstimetableImport implements ToModel,WithHeadingRaw
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Classtimetable([
            'day' =>  $row['day'],
            'period1' =>   $row['period-1'],
            'period2' =>   $row['period-2'],
            'period3' =>   $row['period-3'],
            'period4' =>   $row['period-4'],
            'period5' =>   $row['period-5'],
            'period6' =>   $row['perio-6'],
            'period7' =>   $row['period-7'],
            'period8' =>   $row['period-8'],
        ]);
    }
}