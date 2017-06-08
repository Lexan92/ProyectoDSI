<?php

namespace Escuela;

use Illuminate\Database\Eloquent\Model;

class PartidaNacimiento extends Model
{
<<<<<<< HEAD
   protected $table = 'partidanacimiento';
   protected $primaryKey = 'id_partida';
   public $timestamps = false;
   protected $fillable=[
   			'nie',
   			'folio',
   			'libro',
   			'copiapartida'
   ];

   protected $guarded = [
=======
    protected $table = 'partidanacimiento';

    protected $primaryKey = 'id_partida';

    public $timestamps = false;

    protected $fillable = [
    	'nie',
    	'folio',
    	'libro',
    	'copiapartida'
    ];

    protected $guarded = [
>>>>>>> 0d27f1c9ef227de677ebcec663f65462a9d2af72
    ];
}
