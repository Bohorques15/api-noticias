<?php

namespace GestorBackend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|exists:users,email',
            'password'=> 'required',
        ];
    }

    public function messages(){
        return [
            'email.required'=> 'Un email es necesario',
            'email.exists'=> 'El email no existe en nuestro sistema',
            'email.max'=> 'El email sobrepasa el limite establecido', 
            'email.email'=> 'El email tiene un formato incorrecto',
            'password.required'=> 'Una contraseña es necesaria',
               
        ];
    }
}
