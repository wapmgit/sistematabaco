<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrega extends Model
{
    use HasFactory;
		    
	protected $table='detalle_entrega';

    protected $primaryKey='iddetalle';

    public $timestamps=false;

    protected $fillable =[
    	'identrega',
		'idarticulo',
		'cantidad',
		'precio',
		'valor',
		'fecha'
    ];

    protected $guarded =[

    ];
}
