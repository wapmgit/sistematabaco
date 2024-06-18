<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productores extends Model
{
    use HasFactory;
	protected $table='productores';

    protected $primaryKey='idproductor';

    public $timestamps=false;

    protected $fillable =[
    	'idrecolector',
		'nombre',
		'codigo'
    ];

    protected $guarded =[

    ];
}
