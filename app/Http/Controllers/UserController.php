<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\User;

use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search = null){
        if(!empty($search)){
            $users = User::where('nick', 'LIKE', '%'.$search.'%')->orWhere('name', 'LIKE', '%'.$search.'%')->orWhere('surname', 'LIKE','%'.$search.'%')->orderBy('id', 'desc')->paginate(5);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(5);
        }

        return view('user.index', ['users' =>$users]);
    }
    public function config()
    {
        return view('user.config');
    }
    public function update(Request $request)
    {
        //CONSEGUIR USUARIO IDENTIFICADO
        $user = \Auth::user();
        $id = $user->id;


        // VALIDACION DEL FORMULARIO
        $validate = $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            ]
        );

        // RECOGIDA DE LOS DATOS DEL USUARIO

        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //ASIGNAR NUEVOS VALORES AL OBJETO DE USUARIO



        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // SUBIR LA IMAGEN
        $image_path = $request->file('image_path');

        if ($image_path) {
            // Nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();
            // Guardo la imagen en la carpeta

            Storage::disk('users')->put($image_path_name, File::get($image_path));
            // Actualizo el nombre de la imagen del usuario en el objeto (propiedad)

            $user->image = $image_path_name;
        }


        // EJECUTAR CONSULTA EN LA BASE DE DATOS

        $user->update();

        return redirect()->route('settings')->with(['message' => '¡Se han actualizado los datos correctamente!']);
    }
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }   

    public function profile($id){
        $user = User::find($id);
        return view('user.profile', ['user' => $user]);
    }

    
}
