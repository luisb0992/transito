<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditVehiculoRequest extends FormRequest
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
            'placa'=>'required',
            'serial'=>'required',
            'marca_id'=>'required',
            'color_id'=>'required',
            'año'=>'required',
            'capacidad'=>'required',
            'operadora_id'=>'required',
            'propietario_id'=>'required',
            'status'=>'required|in:1,2,3,4,5',
        ];
    }
     public function messages()
    {
        return [
        'placa.required'=>'La placa es requerida',
        'operadora_id.required'=>'La Operadora es requerida',
        'propietario_id.required'=>'El propietario es requerido',
        'serial.required'=>'El serial es requerido',
        'marca_id.required'=>'debe seleccionar una marca',
        'color_id.required'=>'debe seleccionar un color',
        'año.required'=>'El año es requerido',
        'capacidad.required'=>'La capacidad es requerida',
        'status.required'=>'El status es requerido',
        'status.in'=>'error en la seleccion de status, debe selecionar solo los disponibles',
        ];
    }
}
