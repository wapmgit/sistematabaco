<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;
	protected $table='deposito';

    protected $primaryKey='iddeposito';

    public $timestamps=false;

    protected $fillable =[
    	'descripcion',
    	'capacidad',
    	'movil',
    	'tanques',
    	'estatus'
    ];

    protected $guarded =[

    ];
}
