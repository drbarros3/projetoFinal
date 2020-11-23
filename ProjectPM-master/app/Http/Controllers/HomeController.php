<?php

namespace App\Http\Controllers;

use App\Login;
use Auth;   

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *  
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tela_login');
    }

    public function home()
    {
        return view('inicial');
            
    }

    public function store (Request $request)
    {
        

    }

    public function show(HomeController $homeController)
    {
        //
    }

    // public function confirmaPermuta()
    // {
    //     return redirect()->route('policial\inicio.create');
    // }
}
