<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        // per prendere i dati dello user
        $loggedUser = Auth::user();

        return view ('admin.home', compact('loggedUser'));
    }
}
