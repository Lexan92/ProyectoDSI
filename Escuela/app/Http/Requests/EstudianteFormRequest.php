<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class EstudianteFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'id_partida'=>'required',
        'nombre'=>'required|alpha_dash|max:50',
        'apellido'=>'required|alpha_dash|max:50',
        'fechadenacimiento'=>'required',
        'sexo'=>'required',
        
        'domicilio'=>'required',
        
        'zonaurbana'=>'required',
        'autorizavacuna'=>'required',
        'estado'=>'required'
        ];
    }
}
