<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    use HasFactory;
		protected $table='traslados';

    protected $primaryKey='idtraslado';

    public $timestamps=false;

    protected $fillable =[
    	'concepto',
    	'responsable',
    	'origen',
    	'destino',
    	'fecha',
		'usuario'
    ];

    protected $guarded =[

    ];
}
