<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // return view('admin.index');
        // return "view('admin.index')";
        // return Auth::user();
        // return "<ul><li>Nome: " . Auth::user()['name'] . "</li><li>Email: " . Auth::user()['email'] . "</li><li>Creato: " . Auth::user()['created_at'] . "</li><li>Modificato: " . Auth::user()['updated_at'] . "</li></ul>";

        $user = Auth::user();
        return view('admin.index', compact('user'));
    }
    public function profile()
    {
        // return view('admin.profie');
        // return "view('admin.profie')";
        return Auth::user();
    }
}
