<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [
            [
                'id'=>1,
                'name'=>'Mathematics',
                'admin_id'   =>16440,
                'grade_id' =>666
            ],
            [
                'id'=>2,
                'name'=>'Sinhala',
                'admin_id'   =>16440,
                'grade_id' =>666
            ],
            [
                'id'=>3,
                'name'=>'History',
                'admin_id'   =>16440,
                'grade_id' =>666
            ],
            [
               
                'id'=>4,
                'name'=>'Science',
                'admin_id'   =>16440,
                'grade_id' =>666
            ],
            [
                'id'=>5,
                'name'=>'Tamil',
                'admin_id'   =>16440,
                'grade_id' =>777
            ],
            [
                'id'=>6,
                'name'=>'Sinhala',
                'admin_id'   =>16440,
                'grade_id' =>555
            ],

            ];
            Subject::insert($subject);
    }
}
