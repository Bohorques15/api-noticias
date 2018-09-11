<?php

namespace GestorBackend\Http\Controllers;
use GestorBackend\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use GestorBackend\User;
use Illuminate\Support\Facades\Auth;
use GestorBackend\Http\Requests\LoginRequest;

class APILoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
       

        
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $usuario = User::where('email',$request->get('email'))->first();

        return response()->json(['name' => $usuario->name,'email' => $usuario->email, 'password' => $usuario->password, 'token' => $token]);
    }
}
