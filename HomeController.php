<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        if (Auth::check()) {
            if ($Pessoas = Pessoa::count();
				return view('admin', compact('Pessoas'));
            }
		}
		return view('home');
    }
}
