<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clas_timetable([
            "day" => $row['day'],
            "period" => $row['period'],
            "subject_id" => $row['subject'],
            "class_id" => $row['class'],
            "teacher_id" => $row['teacher'],
            "admin_id" => 1, 
        ]);
    }
}