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

            ['user_name' => 'Heshan namal',
                'email' => 'admin@admin.com',
                'password' => $password,
                'user_type' => 'admin',
                'contact'=> '0717731831',
                'remember_token' => Str::random(10),
            ],

            ['user_name' => 'Lochana dewi',
                'email' => 'teacher@teacher.com',
                'user_type' => 'teacher',
                'password' => $password,
                'contact'=> '0717731833',
                'remember_token' => Str::random(10),
            ],

            ['user_name' => 'Adhil sddiq',
                'email' => 'classteacher@classteacher.com',
                'user_type' => 'class_teacher',
                'password' => $password,
                'contact'=> '0717731834',
                'remember_token' => Str::random(10),
            ],

            ['user_name' => 'Milinda samaranayake',
                'email' => 'student@student.com',
                'user_type' => 'student',
                'password' => $password,
                'contact'=> '0717731834',
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }


}
