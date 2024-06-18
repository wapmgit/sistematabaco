<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;
	protected $table='entrega';

    protected $primaryKey='identrega';

    public $timestamps=false;

    protected $fillable =[
    	'litros',
    	'iddeposito',
    	'fecha',
    	'obervacion'
    ];

    protected $guarded =[

    ];
}
