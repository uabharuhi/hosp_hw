<?php

namespace App\Http\Controllers\Doctor;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\View;

use Auth;

class DoctorController extends Controller
{
   protected $redirectTo = '/doctor/login';

    public function home(Request $request){
        $a = Reservation::all();
        return View::make('doctor.home',['rn'=>count($a)]);
    }

    public function reservations(Request $request){
        $all = Reservation::all()->sortByDesc("date");
        return View::make('doctor.reservations',['reservations'=>$all]) ;
    }
}
