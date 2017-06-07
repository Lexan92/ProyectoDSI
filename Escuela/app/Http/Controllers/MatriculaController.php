<?php

namespace Escuela\Http\Controllers;

use Illuminate\Http\Request;

use Escuela\Http\Requests;

use Escuela\Matricula;
use Escuela\TipoResponsable;
use Escuela\Responsable;
use Escuela\Turno;
use Escuela\Seccion;
use Escuela\Grado;
#use Escuela\Estudiante;
#use Escuela\PartidaNacimiento;
use Escuela\DetalleGrado;
use Escuela\DetallePariente;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Escuela\Http\Requests\MatriculaFormRequest;
use Escuela\Http\Requests\DetalleParienteFormRequest;
use Escuela\Http\Requests\ResponsableFormRequest;

use Escuela\Http\Requests\TipoResponsableFormRequest;
use Escuela\Http\Requests\GradoFormRequest;
use Escuela\Http\Requests\SeccionFormRequest;
use Escuela\Http\Requests\TurnoFormRequest;

#use Escuela\Http\Requests\EstudianteFormRequest;
#use Escuela\Http\Requests\PartidaNacimientoFormFormRequest;

use DB;


class MatriculaController extends Controller
{
    
}
