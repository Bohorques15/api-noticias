<?php

namespace GestorBackend\Http\Controllers;
use GestorBackend\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GestorBackend\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
use GestorBackend\Http\Requests\UsuarioRequest;

class APIRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user_rol = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        $user_rol->roles()->attach(Role::where('name', 'reportero')->first());

        $user = User::first();
        
        $token = JWTAuth::fromUser($user);
        
        $mensaje = "Usuario agregado con exito";
        
        return Response::json(compact('mensaje','token'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'name' => 'required',
            'password'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $usuario = User::find($id);
        
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));

        $usuario->save();

        return $usuario;
    }

    public function getall(){
        $usuarios = User::all();
        return $usuarios;
    }

    public function getone($id){
        $usuario = User::find($id);
        return $usuario;
    }


    public function delete($id){
        $usuario = User::find($id);
        $usuario->delete();
        $mensaje = "Usuario borrado con exito";
        return response()->json(compact('mensaje'));
    }
}
