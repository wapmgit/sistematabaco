<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleTraslado extends Model
{
    use HasFactory;
		protected $table='detalle_traslado';
	protected $primaryKey='iddetalle';

    public $timestamps=false;

    protected $fillable =[
    	'idtraslado',
		'idarticulo',
		'cantidad',
		'precio'
    ];

    protected $guarded =[

    ];
}
