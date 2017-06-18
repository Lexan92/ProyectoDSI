<?php

namespace Escuela\Http\Requests;

use Escuela\Http\Requests\Request;

class MatriculaFormRequest extends Request
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

            //Matricula
            'nie'=>'required|unique:matricula|min:6',
            'presentapartida'=>'required|max:50',
            'certificadoprom'=>'required|max:50',
            'presentafotos'=>'required|max:200',
            'constanciaconducta'=>'required',
            'educacioninicial'=>'required',
            'fechamatricula'=>'required',
            'repitegrado'=>'required',
            'fotografia'=>'mimes:jpeg,bmp,png,jpg',
            'cePrevio'=>'required',

            //PartidaNacimiento
            'folio'=>'required',
            'libro'=>'required',

            //Estudiante
            'nombre'=>'required|alpha_dash|max:50',
            'apellido'=>'required|alpha_dash|max:50',
            'fechadenacimiento'=>'required',
            'sexo'=>'required',
            'domicilio'=>'required',
            'zonahabitacion'=>'required',
            'autorizavacuna'=>'required',
            'discapacidad'=>'required',

            //Contacto de Emergencia
            'nombre4'=>'required|alpha_dash|max:50',
            'apellido4'=>'required|alpha_dash|max:50',
            'telefono4'=>'required|min:8|max:8',



        ];
    }
}
