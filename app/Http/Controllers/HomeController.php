<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Repositories\UserRepo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $d=[];
        if(Qs::userIsTeamAll()){
            $d['users'] = $this->user->getAll();
        }

        return view('Dashboard.dashboard', $d);
    }
    public function back()
    {
        return redirect()->back();
    }
}
