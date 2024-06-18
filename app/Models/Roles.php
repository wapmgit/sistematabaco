<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
		       protected $table='roles';

    protected $primaryKey='idrol';

    public $timestamps=false;

    protected $fillable =[

  'iduser',
  'newruta',
  'editruta',
  'newrecolector',
  'editrecolector',
  'newproductor',
  'editproductor',
  'newdeposito',
  'editdeposito',
  'creardonacion',
  'newrecepcion',
  'anularrecepcion',
  'resultadoslab',
  'reprecepcion',
  'actroles'
		
    ];

    protected $guarded =[

    ];
}
