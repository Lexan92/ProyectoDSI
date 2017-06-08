<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiante';
    protected $primarykey = 'nie';
    public $timestamps = false;

    protected $fillable= [
    	'id_partida',
    	'nombre',
    	'apellido',
    	'fechadenacimiento',
    	'sexo',
    	'discapacidad',
    	'domicilio',
    	'enfermedad',
    	'zonaurbana',
    	'autorizavacuna',
<<<<<<< HEAD
    	'estado',
        'id'
=======
    	'estado'
>>>>>>> 73a6ca3361cbf693de0803b508336068cd8c88da
    ];

    protected $guarded = [
    ];
}
