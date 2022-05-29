<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminTableseeder::class,
            TeacherTableseeder::class,
            GradeTableseeder::class,
            ClassroomTableseeder::class,
            RoleTableseeder::class,
            Teacher_roleTableseeder::class,
            TimetableTableseeder::class,
            SubjectTableseeder::class,
            Subject_teacherTableseeder::class,
            Subject_classroomTableseeder::class
        ]);
    }
}
