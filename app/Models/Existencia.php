<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;
	protected $table='existencia';
    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'idalmacen',
		'idarticulo',
		'existencia'
    ];

    protected $guarded =[

    ];
}
