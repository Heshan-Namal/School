<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userTypeTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'classteacher', 'name' => 'Class Teacher', 'level' => 5],
            ['title' => 'student', 'name' => 'Student', 'level' => 4],
            ['title' => 'teacher', 'name' => 'Teacher', 'level' => 3],
            ['title' => 'admin', 'name' => 'Admin', 'level' => 2],
            ['title' => 'super_admin', 'name' => 'Super Admin', 'level' => 1],
           
        ];
        DB::table('user_types')->insert($data);
    }
}
