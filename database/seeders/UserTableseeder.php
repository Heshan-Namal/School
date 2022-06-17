<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class UserTableseeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();

        $this->createNewUsers();
        
    }

    protected function createNewUsers()
    {
        $password = Hash::make('viduhalapwd'); // Default user password

        $d = [

            [
                'email' => 'admin@admin.com',
                'user_type' => 'admin',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            [
                'email' => 'teacher@teacher.com',
                'user_type' => 'teacher',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            [
                'email' => 'classteacher@classteacher.com',
                'user_type' => 'class_teacher',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            [
                'email' => 'student@student.com',
                'user_type' => 'student',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('user')->insert($d);
    }


}
