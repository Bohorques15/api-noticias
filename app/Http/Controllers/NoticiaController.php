<?php

namespace GestorBackend\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use GestorBackend\User;
use GestorBackend\Noticia;
use JWTAuth;
use GestorBackend\Http\Requests\NoticiaRequest;

use Illuminate\Support\Facades\Auth;


class NoticiaController extends Controller
{
    public function noticia($id){

    	$noticia = Noticia::find($id);
        if($noticia){
            return $noticia->toJson();
        }
    	$mensaje = "La noticia no existe";
        return response()->json(compact('mensaje'));
    }

    public function noticia_fecha($fecha_inicio,$fecha_fin){
    	$date = date_create($fecha_inicio);
		$inicio = date_format($date,"Y-m-d");
		$date = date_create($fecha_fin);
		$fin = date_format($date,"Y-m-d");
		$noticias = Noticia::where('fecha','>=',$inicio)->where('fecha','<=',$fin)->get();
        if($noticias){
            return $noticias;
        }
        $mensaje = "La noticia no existe";
        return response()->json(compact('mensaje'));
    }

    public function noticia_reportero($id){
    	$user = User::find($id);
        if($user){
            $noticias = $user->noticias()->get();
            if($noticias){
                return $noticias;
            }   
        }
        $mensaje = "No hay noticias disponibles";
        return response()->json(compact('mensaje'));
    	
    }

    public function noticia_clasificacion($clasificacion){
    	$noticias = Noticia::where('clasificacion',$clasificacion)->get();
    	if($noticias){
            return $noticias;
        }
        $mensaje = "Las noticias no existen";
        return response()->json(compact('mensaje'));
    }

    public function obtener_noticias(){
    	$noticias = Noticia::all();
    	return $noticias;
    }

    public function crear_noticia(Request $request){

    	$validator = Validator::make($request->all(), [
            'titulo'=> 'required',
            'foto_principal'=> 'required',
            'sintesis'=> 'required',
            'cuerpo'=> 'nullable',
            'reportero'=> 'required',
            'clasificacion'=> 'required',
            'foto1'=> 'nullable',
            'foto2'=> 'nullable',
            'foto3'=> 'nullable',
            'fecha'=> 'required', 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
    	Noticia::create
		(
			[
			'titulo' => $request->get('titulo'),
			'foto_principal' => $request->get('foto_principal'),
			'sintesis' => $request->get('sintesis'),
			'cuerpo' => $request->get('cuerpo'),
			'reportero' => $request->get('reportero'),
			'clasificacion' => $request->get('clasificacion'),
			'foto1' => $request->get('foto1'),
			'foto2' => $request->get('foto2'),
			'foto3' => $request->get('foto3'),
			'fecha' => $request->get('fecha'),
            'user_id' => Auth::user()->id
			]
		);
		$mensaje = "Noticia creada con exito";
		return response()->json(compact('mensaje'));
    }

    public function borrar_noticia($id){
    	$noticia = Noticia::find($id);
    	
        if($noticia){
            $noticia->delete();
            $mensaje = "Noticia borrada con exito";
            return response()->json(compact('mensaje'));
        }
    	$mensaje = "No existe la noticia";
		return response()->json(compact('mensaje'));
    }

    public function actualizar_noticia(Request $request, $id){
    	$validator = Validator::make($request->all(), [
            'titulo'=> 'required',
            'foto_principal'=> 'required',
            'sintesis'=> 'required',
            'cuerpo'=> 'nullable',
            'clasificacion'=> 'required',
            'foto1'=> 'nullable',
            'foto2'=> 'nullable',
            'foto3'=> 'nullable',
            'fecha'=> 'required' 
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
    	$noticia = Noticia::find($id);
    	$noticia->titulo = $request->get('titulo');
		$noticia->foto_principal = $request->get('foto_principal');
		$noticia->sintesis = $request->get('sintesis');
		$noticia->cuerpo = $request->get('cuerpo');
		$noticia->clasificacion = $request->get('clasificacion');
		$noticia->foto1 = $request->get('foto1');
		$noticia->foto2 = $request->get('foto2');
		$noticia->foto3 = $request->get('foto3');
		$noticia->fecha = $request->get('fecha');
		$noticia->save();
		return $noticia->toJson();
    }
}
