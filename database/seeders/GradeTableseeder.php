<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade = [
            [
                'id'         => 555,
                'grade_no'       =>5,
                'num_of_student'      =>200,
                'admin_id'   =>16440,
                'teacher_id' =>111
            ],
            [
                'id'         => 666,
                'grade_no'       =>6,
                'num_of_student'      =>250,
                'admin_id'   =>16440,
                'teacher_id' =>222
            ],
            [
                'id'         => 777,
                'grade_no'       =>7,
                'num_of_student'      =>300,
                'admin_id'   =>16440,
                'teacher_id' =>333
            ],

            ];
            Grade::insert($grade);
    }
}
