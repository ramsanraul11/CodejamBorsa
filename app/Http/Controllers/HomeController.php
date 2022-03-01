<?php

namespace App\Http\Controllers;

use App\Models\Empreses;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function empresesShow(){
        $empreses =  Empreses::all();

        return View::make('empresa.empresa', compact('empreses'));
    }

    public function editEmpresa($id){
        $empresa =  Empreses::findOrFail($id);

        return View::make('empresa.empresa_edit', compact('empresa'));
    }
}
