<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehiculoRequest extends FormRequest
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
            'propietario_id'=>'required',
            'operadora_id'=>'required',
            'status'=>'required|in:1,2,3,4,5',
        ];
    }
     public function messages()
    {
        return [
        'placa.required'=>'La placa es requerida',
        'serial.required'=>'El serial es requerido',
        'marca_id.required'=>'debe seleccionar una marca',
        'color_id.required'=>'debe seleccionar un color',
        'año.required'=>'El año es requerido',
        'capacidad.required'=>'La capacidad es requerida',
        'propietario_id.required'=>'Debe eligir un propietario para este vehiculo',
        'operadora_id.required'=>'Debe eligir una operadora para este vehiculo',
        'status.required'=>'El status es requerido',
        'status.in'=>'error en la seleccion de status, debe selecionar solo los disponibles',
        ];
    }
}
