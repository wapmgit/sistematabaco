<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovExistencia extends Model
{
		use HasFactory;
		protected $table='mov_existencias';

    protected $primaryKey='idmov';

    public $timestamps=false;

    protected $fillable =[
    	'idmov',
    	'tipo',
    	'iddoc',
    	'deposito',
    	'articulo',
		'cantidad',
		'fecha',
		'axisant',
		'usuario'
    ];

    protected $guarded =[

    ];
}
