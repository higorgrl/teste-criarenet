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
            if (Auth::user()->roles[0]->rol_id == 2) {
				$Pessoas = Pessoa::count();
				return view('admin', compact('Pessoas'));
            }
		}
		return view('home');
    }
}
