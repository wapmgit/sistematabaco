<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
	protected $table='produccion';

    protected $primaryKey='idproceso';

    public $timestamps=false;

    protected $fillable =[
    	'idsupervisor',
    	'idparrilla',
    	'idcocedor',
    	'idturno',
		'fecha',
    	'kgcocina',
    	'kgbajado',
    	'kgjalea',
		'rendimiento',
    	'kgtren',
    	'estatus'
    ];

    protected $guarded =[

    ];
}
