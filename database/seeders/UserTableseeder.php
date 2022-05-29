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
        DB::table('users')->delete();

        $this->createNewUsers();
        
    }

    protected function createNewUsers()
    {
        $password = Hash::make('cj'); // Default user password

        $d = [

            ['name' => 'Heshan namal',
                'email' => 'cj@cj.com',
                'username' => 'cj',
                'password' => $password,
                'user_type' => 'super_admin',
                'contact'=> '0717731831',
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Kushan maduranga',
            'email' => 'admin@admin.com',
            'password' => $password,
            'user_type' => 'admin',
            'username' => 'admin',
            'contact'=> '0717731856',
            'remember_token' => Str::random(10),
            ],
            ['name' => 'Kushan maduranga2',
            'email' => 'admin2@admin.com',
            'password' => $password,
            'user_type' => 'student',
            'username' => 'student2',
            'contact'=> '0717731832',
            'remember_token' => Str::random(10),
            ],

            ['name' => 'Lochana dewi',
                'email' => 'teacher@teacher.com',
                'user_type' => 'teacher',
                'username' => 'teacher',
                'password' => $password,
                'contact'=> '0717731833',
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Milinda ama',
                'email' => 'classteacher@classteacher.com',
                'user_type' => 'class_teacher',
                'username' => 'class teacher',
                'password' => $password,
                'contact'=> '0717731834',
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Adhil sddiq',
                'email' => 'student@student.com',
                'user_type' => 'student',
                'username' => 'student',
                'password' => $password,
                'contact'=> '0717731834',
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }


}
