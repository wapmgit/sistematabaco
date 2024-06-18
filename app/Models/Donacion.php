<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
		protected $table='donacion';

    protected $primaryKey='iddonacion';

    public $timestamps=false;

    protected $fillable =[
    	'litros',
    	'beneficiario',
    	'fecha',
    	'deposito',
		'tanque',
		'usuario'
    ];

    protected $guarded =[

    ];
}
