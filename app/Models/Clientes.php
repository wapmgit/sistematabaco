<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
	protected $table='clientes';
    
    protected $primaryKey='idcliente';
    
    public $timestamps=false;
    
    protected $fillable =[
        'nombre',
        'cedula',
        'telefono',
        'direccion'
    ];
    
    protected $guarded =[
        
    ];
}
