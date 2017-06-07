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
            'nie'=>'required',
            'iddetallegrado'=>'required',
            'presentapartida'=>'required|max:50',
            'certificadoprom'=>'required|max:50',
            'presentafotos'=>'required|max:200',
            'constanciaconducta'=>'required',
            'educacioninicial'=>'required'
            'fechamatricula'=>'required',
            'repitegrado'=>'required',
            'fotografia'=>'required',
            'cePrevio'=>'required',
            #'estado'=>'required',
        ];
    }
}
