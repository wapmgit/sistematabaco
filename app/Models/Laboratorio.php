<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
	protected $table='laboratorio';

    protected $primaryKey='idprueba';

    public $timestamps=false;

    protected $fillable =[
    	'idrecoleccion',
    	'ltst1',
    	'alco',
    	'pero',
    	'acdz',
    	'suer',
    	'rexa',
    	'gra',
    	'saca',    	
    	'dep',    	
    	'tnq',    	
		'ltst2',
    	'alco2',
    	'pero2',
    	'acdz2',
    	'suer2',
    	'rexa2',
    	'gra2',
    	'saca2',    	
    	'dep2',    	
    	'tnq2'
    ];

    protected $guarded =[

    ];
}
