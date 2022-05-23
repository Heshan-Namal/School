<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Seeder;

class TimetableTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timetable = [
            [
                'id'         => 1,
                'day'        =>'Monday',
                'class_id'   => 1002,
                'period1' =>'Mathematics',
                'period2' =>'Mathematics',
                'period3' =>'Science',
                'period4' =>'English',
                'period5' =>'History',
                'period6' =>'Sinhala',
                'period7' =>'pt',
                'period8' =>'pt',
                'teacher_id' => 222,
                
                
            ],
            [
                'id'         => 2,
                'day'        =>'TuesDay',
                'class_id'   => 1002,
                'period1' =>'Mathematics',
                'period2' =>'Mathematics',
                'period3' =>'Science',
                'period4' =>'English',
                'period5' =>'History',
                'period6' =>'Sinhala',
                'period7' =>'pt',
                'period8' =>'Health',
                'teacher_id' => 222,
            ],
            [
                'id'         => 3,
                'day'        =>'Wednesday',
                'class_id'   => 1002,
                'period1' =>'Mathematics',
                'period2' =>'Mathematics',
                'period3' =>'Science',
                'period4' =>'English',
                'period5' =>'History',
                'period6' =>'Sinhala',
                'period7' =>'Health',
                'period8' =>'Health',
                'teacher_id' => 222,
            ],

            ];
            Timetable::insert($timetable);
    }
}
