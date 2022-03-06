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
    //para cada profile coge el usuario que esta logged in y le deja editar sus campos de la base de datos
    public function editUserProfile()
    {
        $user = auth()->user();
        $titulos = Estudis::All();
        $anys = ['2000','2001','2002','2003','2004','2005','2006','2007','2008',
            '2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019',
            '2020','2021','2022'];
        return View::make('titulado.titulado_editperfil', compact('user','titulos','anys'));
    }
    //cuando intentamos guardar el user llamamos a esta funcion con un post que esta en las rutas
    public function updateUserProfile(Request $request){
        $nom = $request -> NameTitulado;
        $cognom = $request -> SurnameTitulado;
        $email = $request -> EmailTitulado;
        $dni = $request -> DNITitulado;
        $telefono = $request -> TelefonTitulado;
        if ($request -> isTreballant == null){
            $treballant = false;
        } else {
            $treballant = true;
        }
        $data = [
            'nom' => $nom,
            'surname' => $cognom,
            'email' => $email,
            'dni' => $dni,
            'telefon' => $telefono,
            'isTreballant' => $treballant,
        ];
        $user = User::find($request -> IdTitulado);
        $user->update($data);
        //$idestudi = $request -> titulos;
        $user = User::find($request -> IdTitulado);
        $estudi = Estudis::find($request -> titulos);

        $eu = new EstudisUser();

        $eu -> users() -> associate($user)->save();
        $eu -> estudis() -> associate($estudi)->save();
        $anypromocio = $request -> AnyPromocio;
        $anypromocio = (int)$anypromocio;
        $eu -> AnyPromocio = $anypromocio;
        $eu -> save();

        return redirect()->route('home');
    }
}
