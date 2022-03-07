<?php

namespace App\Http\Controllers;

use App\Models\Empreses;
use App\Models\Enviaments;
use App\Models\Estudis;
use App\Models\EstudisUser;
use App\Models\Ofertes;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function SubmitestudiantsEdit(Request $request){
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
        if ($request -> isCoordinador == null){
            $coordinant = false;
        } else {
            $coordinant = true;
        }

        $user = User::find($request -> IdTitulado);
        $user->name = $nom;
        $user->surname=$cognom;
        $user->email =$email;
        $user->dni =$dni;
        $user->telefon =$telefono;
        $user->isTreballant =$treballant;
        $user->isCoordinador =$coordinant;
        $user->save();
        return redirect()->route('estudiantsShow');
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

    public function estudiantsShow(){
        $users = DB::table('users')->
                    select('*')->
                    where('isCoordinador', '=', 0)->
                    get();
        return View::make('EstudiantsUsers.estudiantes', compact('users'));

    }

    public function estudiantsEdit($id = null){
        $user =  User::findOrFail($id);

        return View::make('EstudiantsUsers.estudiantes_edit', compact('user'));
    }

    public function ofertesShow(){

        if(Auth::user()->isCoordinador == true){
            $ofertes =  DB::table('ofertes')->get();
        }else{
            $ofertes = DB::table('ofertes')
                ->join('enviaments', 'ofertes.IdOferta', '=', 'enviaments.IdOferta')
                ->select('ofertes.*')
                ->where('enviaments.IdUsuari', '=', Auth::user()->id)
                ->get();
//            $estudis = DB::table('estudis')
//                ->join('ofertesestudis', 'estudis.IdEstudi', '=', 'ofertesestudis.IdEstudi')
//                ->select('estudis.*')
//                ->where('ofertesestudis.IdOferta', '=', $ofertes->IdOferta)
//                ->get();
//
//            $data = [
//                'ofertas'
//            ];
        }

        return View::make('oferta.ofertas', compact('ofertes'));
//        return response()->json($ofertes);
    }

    public function editOferta($id = null){
        $oferta =  Ofertes::findOrFail($id);
        $empreses = Empreses::all();
        return View::make('oferta.oferta_edit', compact('oferta'),compact('empreses'));
    }

    public function addOferta($id = null){
        $empresa =  Empreses::findOrFail($id);
        return View::make('oferta.oferta_add', compact('empresa'));
    }
    public function submitOfertaAdd(Request $request){
        $desc = $request->EditDescripcionOferta;
        $isPendent = true;
        $empresa = $request->EditEmpresaOferta;
        $emp=Empreses::findOrFail($empresa);

        $data = [
            'descripcio' => $desc,
            'pendentEnviament' => $isPendent
        ];
        $oferta = Ofertes::create($data);
        $oferta->empreses()->associate($emp)->save();
        return redirect()->route('ofertesShow');
    }

    public function submitOfertaEdit(Request $request){
        $desc = $request->EditDescripcionOferta;
        $isPendent = $request->has('EditPendentOferta');
        $empresa = $request->EditEmpresaOferta;
        $emp=Empreses::findOrFail($empresa);

        $oferta = Ofertes::findOrFail($request->IdOferta);

        $oferta->empreses()->associate($emp);
        $data = [
            'descripcio' => $desc,
            'pendentEnviament' => $isPendent
        ];
        $oferta->update($data);
        $oferta->save();
        return redirect()->route('ofertesShow');
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

    public function enviarOferta(){
        echo 'HOLAAAAAAAAAAAAA';
        $ofertesPendents = DB::table('ofertes')
            ->select('*')
            ->where('pendentEnviament', '=', 1)
            ->get();

        $usersNotWorking = DB::table('users')
            ->select('*')
            ->where('isCoordinador', '=', 0)
            ->where('isTreballant', '=', 0)
            ->get();
       //var_dump($usersNotWorking);
        foreach ($ofertesPendents as $oferta) {
            $estudisO = DB::table('ofertesestudis')
                ->select('*')
                ->where('IdOferta', '=', $oferta->IdOferta)
                ->get();
            //var_dump($estudisO);
            foreach ($usersNotWorking as $user){
               $estudisU = DB::table('estudisuser')
                   ->select('*')
                   ->where('IdUsuari', '=', $user->id)
                   ->get();

               //var_dump($estudisU);
               foreach ($estudisU as $eu){
                   foreach($estudisO as $eo){
                       if($eu->IdEstudi == $eo->IdEstudi){
                           $o = Ofertes::findOrFail($oferta->IdOferta);
                           $u = User::findOrFail($user->id);
                           $o->users()->attach($u);
                           $o->save();
                           $o->pendentEnviament = 0;
                           $o->save();
                       }
                   }

               }

            }
        }

        //ofertesestudis --> nomes s'envien les ofertes als alumnes que tenen aquests estudis
        // i no estan treballant i si encara no s'ha enviat la oferta

        // array users que no son coordinadors
        //comprovo si treballen o no
    }
}
