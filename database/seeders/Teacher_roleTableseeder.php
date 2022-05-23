<?php

namespace Database\Seeders;

use App\Models\Teacher_role;
use Illuminate\Database\Seeder;

class Teacher_roleTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'teacher_id'         => 444,
                'role_id'       =>3
            ],
            [
                'teacher_id'         => 222,
                'role_id'       =>2
            ],
            [
                'teacher_id'         => 333,
                'role_id'       =>2
            ],
            [
                'teacher_id'         => 111,
                'role_id'       =>2
            ],
            [
                'teacher_id'         => 222,
                'role_id'       =>1
            ],

            ];
            Teacher_role::insert($role);
    }
}
