<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controltobos extends Model
{
    use HasFactory;
	protected $table='controltobos';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'idcliente',
    	'tipo',
    	'deposito',
    	'cantidad',
    	'observacion',
    	'fecha',
		'usuario'
    ];

    protected $guarded =[

    ];
}
