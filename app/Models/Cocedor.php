<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocedor extends Model
{
    use HasFactory;
	protected $table='cocedor';

    protected $primaryKey='idcocedor';

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
    	'telefono',
		'ruta'
    ];

    protected $guarded =[

    ];
}
