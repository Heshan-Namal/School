<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableseeder extends Seeder
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
                'id'         => 1,
                'name'       =>'Class Teacher'
            ],
            [
                'id'         => 2,
                'name'       =>'Grade Incharge'
            ],
            [
                'id'         => 3,
                'name'       =>'Subject Teacher'
            ],

            ];
            Role::insert($role);
    }
}
