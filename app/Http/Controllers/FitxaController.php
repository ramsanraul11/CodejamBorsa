<?php
namespace App\Http\Controllers;

use App\Models\Estudis;
use App\Models\EstudisUser;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;

class FitxaController extends Controller
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

    //para cada profile coge el usuario que esta logged in y le deja editar sus campos de la base de datos
    public function editUserProfile()
    {
        $user = auth()->user();
        return View::make('titulado.titulado_editperfil', compact('user'));
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
        $user = User::find($request -> IdTitulado);
        $user->name = $nom;
        $user->surname=$cognom;
        $user->email =$email;
        $user->dni =$dni;
        $user->telefon =$telefono;
        $user->isTreballant =$treballant;
        $user->save();
        return redirect()->route('home');
    }

    //mostra una llista amb tots els estudis d'un user
    public function userStudies(){
        $user = auth()->user();
        $ue = DB::table('estudisuser as UE')
        ->select('UE.*','E.nom')
        ->join('estudis as E','E.IdEstudi','=','UE.IdEstudi')
        ->where('IdUsuari',$user->id)
        ->get();
        //$ue = DB::table('estudisuser')->where('IdUsuari',$user->id)->get();
        return View::make('titulado.titulado_estudis',compact('ue','user'));
    }
    public function borrarTituloFromUser($id=null){
        DB::table('estudisuser')
            ->where('IdEstudiUser','=',$id)
            ->delete();
        return $this->userStudies();
    }


    public function addStudyView(){
        $user = auth()->user();
        $username = $user->name." ".$user->surname;


        $anys = ['2000','2001','2002','2003','2004','2005','2006','2007','2008',
            '2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019',
            '2020','2021','2022'];
        $array = Estudis::All();
        $ue = DB::table('estudisuser as UE')
            ->select('UE.*','E.nom')
            ->join('estudis as E','E.IdEstudi','=','UE.IdEstudi')
            ->where('IdUsuari',$user->id)
            ->get()->toArray();
        $titulos = array();

        foreach($array as $titulo){
            $key = array_search($titulo->IdEstudi, array_column($ue,'IdEstudi'));
            if(false!==$key){

            } else {
                array_push($titulos,$titulo);
            }
        }

        return View::make('titulado.titulado_addtitulo',compact('titulos','anys','username'));
    }

    public function addUserStudy(Request $request){
        $eu = new EstudisUser;

        $user = auth()->user();
        $estudi = Estudis::findOrFail($request -> titulos);

        $eu->users()->associate($user);
        $eu->estudis()->associate($estudi);
        $AnyPromocio = $request->AnyPromocio;
        $AnyPromocio = (int)$AnyPromocio;
        $eu->AnyPromocio=$AnyPromocio;
        $eu -> save();
        return redirect()->route('userStudies');
    }

    public function showCVView(){
        $user = auth()->user();
        return View::make('titulado.titulado_CV',compact('user'));
    }
    public function updatedCV(Request $request){
        $user = auth()->user();
        if($request->hasFile('pdf')){
            if($request->pdf->getClientOriginalExtension() != 'pdf'){
                return redirect()->route('showCVView');
            }
            $time = date("d-m-Y")."-".time();
            $fileName = $time."-".$user->name.$user->surname.".pdf";
            $archivo = $request->file('pdf');

            if($archivo->move('cv',$fileName)){
                $oldFile = $user->nameFile;
                File::delete(public_path('cv/'.$oldFile));
                $user->nameFile = $fileName;
                $user->save();
            }

        }
        return redirect()->route('showCVView');
    }

    public function download(Request $request,$file){
        return response()->download(public_path('cv/'.$file));
    }
}
