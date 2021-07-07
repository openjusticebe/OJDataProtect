<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function home()
    {
        return redirect()->route('dashboard');
    }
}
