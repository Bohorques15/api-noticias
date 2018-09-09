<?php

namespace GestorBackend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'titulo'=> 'required',
            'foto_principal'=> 'required',
            'sintesis'=> 'required',
            'cuerpo'=> 'nullable',
            'reportero'=> 'required',
            'clasificacion'=> 'required',
            'foto1'=> 'nullable',
            'foto2'=> 'nullable',
            'foto3'=> 'nullable',
            'fecha'=> 'required'    
        ];
    }

    public function messages(){
        return [
            'titulo.required'=> 'Un titulo es necesario',
            'foto_principal.required'=> 'Un foto foto principal es necesaria',
            'sintesis.required'=> 'Una sintesis es necesaria',
            'reportero.required'=> 'Un reportero es necesario',
            'clasificacion.required'=> 'Una clasificacion es necesaria',
            'fecha.required'=> 'Una fecha es necesaria', 
        ];
    }

}
