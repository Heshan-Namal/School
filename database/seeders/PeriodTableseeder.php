<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $period = [
            [
                'id'         => 1,
                'name'       =>'period',
                'timetable_id' =>1,
                'class_id' =>1002,
                'links'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']",
                'notes'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']"
            ],
            [
                'id'         => 2,
                'name'       =>'period',
                'timetable_id' =>2,
                'class_id' =>1002,
                'links'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']",
                'notes'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']"
            ],
            [
                'id'         => 3,
                'name'       =>'period',
                'timetable_id' =>3,
                'class_id' =>1002,
                'links'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']",
                'notes'    =>"['null','null','null','null','null','hvbfdgbduidfgdfgjhdfgubdfbjdgu','null','null']"
            ],

            ];
            Period::insert($period);
    }
}
