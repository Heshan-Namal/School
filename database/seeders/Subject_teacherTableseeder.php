<?php

namespace Database\Seeders;

use App\Models\Subject_teacher;
use Illuminate\Database\Seeder;

class Subject_teacherTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject_teacher = [
            [
                
                'subject_id'   =>1,
                'teacher_id' =>111
            ],
            [
                'subject_id'   =>2,
                'teacher_id' =>333
            ],
            [
               
                'subject_id'   =>5,
                'teacher_id' =>333
            ],
            [
                
                'subject_id'   =>1,
                'teacher_id' =>222
            ],
            [
                
                'subject_id'   =>6,
                'teacher_id' =>333
            ],

            ];
            Subject_teacher::insert($subject_teacher);
    }
}
