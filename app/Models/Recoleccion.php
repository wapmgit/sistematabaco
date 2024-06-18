<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recoleccion extends Model
{
    use HasFactory;
		    
	protected $table='recoleccion';

    protected $primaryKey='idrecoleccion';

    public $timestamps=false;

    protected $fillable =[
    	'idruta',
    	'idrecolector',
    	'idlitros',
    	'observacion',
    	'fecha'
    ];

    protected $guarded =[

    ];
}
