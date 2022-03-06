<?php

namespace App\Http\Controllers;

use App\Models\Empreses;
use App\Models\Estudis;
use App\Models\EstudisUser;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
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

    public function submitEmpresaEdit(Request $request){
        $nom = $request->NameEmpresa;
        $mail = $request->MailEmpresa;
        $id = $request->IdEmpresa;
        $data = [
         'nom' => $nom,
         'email' => $mail,
        ];
        $emp=Empreses::findOrFail($id);
        $emp->update($data);
        return redirect()->route('empresesShow');
    }

    public function loadAddEmpresaView(){
        return view('empresa.empresa_add');
    }

    public function addEmpresa(Request $request){
        $nom = $request->NameEmpresa;
        $mail = $request->MailEmpresa;
        $data = [
            'nom' => $nom,
            'email' => $mail,
        ];

        Empreses::create($data);

        return redirect()->route('empresesShow');
    }

    public function empresesShow(){
        $empreses =  Empreses::paginate(5);

        return View::make('empresa.empresa', compact('empreses'));
    }

    public function editEmpresa($id = null){
        $empresa =  Empreses::findOrFail($id);

        return View::make('empresa.empresa_edit', compact('empresa'));
    }


    public function loadAddEstudiView(){
        return view('estudi.estudi_add');
    }

    public function submitEstudiEdit(Request $request){
        $nom = $request->NameEstudi;
        $id = $request->IdEstudi;
        $data = [
            'nom' => $nom
        ];
        $estu=Estudis::findOrFail($id);
        $estu->update($data);
        return redirect()->route('estudisShow');
    }

    public function addEstudi(Request $request){
        $nom = $request->NameEstudi;
        $data = [
            'nom' => $nom
        ];

        Estudis::create($data);

        return redirect()->route('estudisShow');
    }

    public function estudisShow(){
        $estudis =  Estudis::paginate(5);

        return View::make('estudi.estudi', compact('estudis'));
    }

    public function editEstudi($id = null){
        $estudi =  Estudis::findOrFail($id);

        return View::make('estudi.estudi_edit', compact('estudi'));
    }
}
