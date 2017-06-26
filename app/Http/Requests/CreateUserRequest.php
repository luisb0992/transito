<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'cedula'=>'required|numeric|unique:users,cedula',
            'name'=>'required',
            'ape'=>'required',
            'email'=>'required|email|unique:users,email',
            'perfil_id'=>'required|in:1,2',
            'status'=>'required|in:1,0',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
        'cedula.required'=>'La cedula no debe estar vacia',
        'name.required'=>'El nombre no debe estar vacio',
        'ape.required'=>'El apellido no debe estar vacio',
        'email.required'=>'El correo no debe estar vacio',
        'email.email'=>'El correo debe ser formato email, Ejemplo: yo@ejemplo.com',
        'email.unique'=>'El correo no debe estar en uso',
        'perfil_id.required'=>'Debe seleccionar un perfil del usuario',
        'perfil_id.in'=>'Error al elegir el perfil del usuario',
        'status.required'=>'Debe seleccionar un status',
        'status.in'=>'Error al elegir el status del usuario',
        'password.required'=>'La contraseña no debe estar vacia',
        ];
    }
}
