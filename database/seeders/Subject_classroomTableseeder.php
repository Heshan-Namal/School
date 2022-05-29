<?php

namespace Database\Seeders;

use App\Models\Subject_classroom;
use Illuminate\Database\Seeder;

class Subject_classroomTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject_class = [
            [
                
                'class_id'   =>1006,
                'subject_id' =>5
            ],
            [
                'class_id'   =>1005,
                'subject_id' =>5
            ],
            [
               
                'class_id'   =>1004,
                'subject_id' =>2
            ],
            [
                
                'class_id'   =>1003,
                'subject_id' =>6
            ],

            ];
            Subject_classroom::insert($subject_class);
    }
}
