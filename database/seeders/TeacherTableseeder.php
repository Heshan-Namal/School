<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = [
            [
                'id'         => 111,
                'name'       =>'kamala',
                'img'         =>'',
                'email'      =>'kamala@com',
                'password'   =>1234,
                'contact'    =>01122553,
                'admin_id' =>16440
            ],
            [
                'id'         => 222,
                'name'       =>'nayana',
                'img'         =>'',
                'email'      =>'nayana@com',
                'password'   =>1234,
                'contact'    =>01123353,
                'admin_id' =>16440
            ],
            [
                'id'         => 333,
                'name'       =>'sujeewa',
                'img'         =>'',
                'email'      =>'sujeewaa@com',
                'password'   =>1234,
                'contact'    =>01122753,
                'admin_id' =>16440
            ],
            [
                'id'         => 444,
                'name'       =>'nimala',
                'img'         =>'',
                'email'      =>'nimala@com',
                'password'   =>1234,
                'contact'    =>01122653,
                'admin_id' =>16440
            ],

            ];
            Teacher::insert($teacher);
    }
}
