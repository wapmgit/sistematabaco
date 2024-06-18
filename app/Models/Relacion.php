<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    use HasFactory;
		protected $table='relacion';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'idprueba',
    	'deposito',
    	'tanque',
    	'litros',
    	'litrosb',
		'idsalida'
    ];

    protected $guarded =[

    ];
}
