<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = \Auth::user();
        $likes =  Like::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);

        

        return view('like.index', ['likes' => $likes]);
    }

    public function like($image_id){
        // Recoger datos del usuario e imagen

        $user = \Auth::user();

        // Establecer datos en el objeto

        // Condicion para ver si existe el like

        $isset_like = Like::where('user_id', $user->id)->where('image_id', $image_id)->count();

        


        if($isset_like == 0){

            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;
            // Guardar en la base de datos
            $like->save();

            $numberlikes = Like::where('image_id', $image_id)->count();
    
            return Response()->json(['like'=> $like, 'numberlikes' => $numberlikes]);
        } else {
            $numberlikes = Like::where('image_id', $image_id)->count();
            return Response()->json(['message'=> 'El like ya existe', 'numberlikes' => $numberlikes]);
        }


    }
    public function dislike($image_id){
         // Recoger datos del usuario e imagen

         $user = \Auth::user();

         // Establecer datos en el objeto
 
         // Condicion para ver si existe el like
 
         $like = Like::where('user_id', $user->id)->where('image_id', $image_id)->first();

         
 
         if($like){
 
            //  Borrar Like
             $like->delete();

             $numberlikes = Like::where('image_id', $image_id)->count();
     
             return Response()->json(['like'=> $like, 'message'=> 'Has dado dislike correctamente', 'numberlikes' => $numberlikes]);
         } else {
            $numberlikes = Like::where('image_id', $image_id)->count();
             return Response()->json(['message'=> 'El like no existe', 'numberlikes' => $numberlikes]);
         }
 
    }

    
}
