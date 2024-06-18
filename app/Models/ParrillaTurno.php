<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParrillaTurno extends Model
{
    use HasFactory;
			protected $table='parrillaturno';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'parrilla',
    	'turno',
    	'status'
    ];

    protected $guarded =[

    ];
}
