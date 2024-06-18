<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
	protected $table='articulos';

    protected $primaryKey='idarticulo';

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
    	'stock',
    	'precio'
    ];

    protected $guarded =[

    ];
}
