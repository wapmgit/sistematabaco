<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    use HasFactory;
	    
	protected $table='rutas';

    protected $primaryKey='idruta';

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
    	'contacto',
    	'telefono'
    ];

    protected $guarded =[

    ];
}

