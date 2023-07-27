<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestPageController extends Controller
{
    public function home (){
        return view('guest.home');
    }

    public function index () {
        return view('guest.beaches.index');
    }
}
