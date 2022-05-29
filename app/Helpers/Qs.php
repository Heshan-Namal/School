<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\StudentRecord;
use App\Models\Subject;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class Qs
{
    public static function getDefaultUserImage()
    {
        return asset('public\assets\front\images\defualt.jpg');
    }

    //***Define Team groups****
    public static function getTeamSu()  // super admin group---
    {
        return [ 'super_admin'];    
    }
    public static function getTeamAd()  //  admin group---
    {
        return ['admin', 'super_admin'];    
    }
    public static function getTeamTe()  // teacher group---
    {
        return ['teacher', 'class_teacher'];
    }
    public static function getTeamLe()  // student group---
    {
        return ['student'];
    }
    public static function getTeamAll()  // all types group---
    {
        return ['admin', 'super_admin','teacher', 'class_teacher','student'];
    }
    

    //check user's group
    public static function userIsTeamSu()
    {
        return in_array(Auth::user()->user_type, self::getTeamSu());
    }
    public static function userIsTeamAd()
    {
        return in_array(Auth::user()->user_type, self::getTeamAd());
    }
    public static function userIsTeamTe()
    {
        return in_array(Auth::user()->user_type, self::getTeamTe());
    }
    public static function userIsTeamLe()
    {
        return in_array(Auth::user()->user_type, self::getTeamLe());
    }
    public static function userIsTeamAll()
    {
        
        return in_array(Auth::user()->user_type, self::getTeamAll());
    }

}
