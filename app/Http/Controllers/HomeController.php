<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.mangas.index';
        } 
        else if ($user->hasRole('user')){
            $home = 'user.mangas.index';
        }
        return redirect()->route($home);
    }

    public function publisherIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.publishers.index';
        } 
        else if ($user->hasRole('user')){
            $home = 'user.publishers.index';
        }
        return redirect()->route($home);
    }

    public function authorsIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.authors.index';
        } 
        else if ($user->hasRole('user')){
            $home = 'user.authors.index';
        }
        return redirect()->route($home);
    }
}
