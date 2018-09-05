<?php

namespace GestorBackend\Http\Controllers;

use Illuminate\Http\Request;
use GestorBackend\User;
use GestorBackend\Noticia;

class NoticiaController extends Controller
{
    public function noticia(Request $request){
    	$id = $request->get('id');
    	$noticia = Noticia::find($id);

    	return $noticia->toJson();

    }

    public function obtener_noticias(Request $request){
    	$id = $request->get('id');
    	$noticias = User::find($id)->noticias;
    	return $noticias->toJson();
    }

    public function crear_noticia(Request $request){
    	Noticia::create
		(
			[
			'titulo' => $request->get('titulo'),
			'foto_principal' => $request->get('foto_principal'),
			'sintesis' => $request->get('sintesis'),
			'cuerpo' => $request->get('cuerpo'),
			'reportero' => $request->get('reportero'),
			'cedula' => $request->get('cedula'),
			'clasificacion' => $request->get('clasificacion'),
			'foto1' => $request->get('foto1'),
			'foto2' => $request->get('foto2'),
			'foto3' => $request->get('foto3'),
			'fecha' => $request->get('fecha')
			]
		);
		$mensaje = "Noticia creada con exito";
		return response()->json(compact('mensaje'));
    }

    public function borrar_noticia(Request $request){
    	$id = $request->get('id');
    	$noticia = Noticia::find($id);
    	$noticia->delete();
    	$mensaje = "Noticia borrada con exito";
		return response()->json(compact('mensaje'));
    }

    public function actualizar_noticia(Request $request){
    	$id = $request->get('id');
    	$noticia = Noticia::find($id);
    	$noticia->titulo = $request->get('titulo'),
		$noticia->foto_principal = $request->get('foto_principal'),
		$noticia->sintesis = $request->get('sintesis'),
		$noticia->cuerpo = $request->get('cuerpo'),
		$noticia->reportero = $request->get('reportero'),
		$noticia->cedula = $request->get('cedula'),
		$noticia->clasificacion = $request->get('clasificacion'),
		$noticia->foto1 = $request->get('foto1'),
		$noticia->foto2 = $request->get('foto2'),
		$noticia->foto3 = $request->get('foto3'),
		$noticia->fecha = $request->get('fecha')
		$noticia->save();
		return $noticia->toJson();
    }
}
