<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanques extends Model
{
    use HasFactory;
	protected $table='tanques';

    protected $primaryKey='idtanque';

    public $timestamps=false;

    protected $fillable =[
    	'iddeposito',
    	'capacidad',
    	'nombre',
    	'uso',
		'tipo'
    ];

    protected $guarded =[

    ];
}
