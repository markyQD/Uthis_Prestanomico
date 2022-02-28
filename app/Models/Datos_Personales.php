<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_Personales extends Model
{
    protected $table = 'datos_cliente';

    protected $fillable  = ['cliente_id','status','nombre',
    'apellido_paterno','apellido_materno','rfc',
    'fecha_nacimiento','ingresos','egresos','no_dependientes',
    'estado_civil','genero','ultimo_grado_estudios'];
 
    protected $PK = 'cliente_id';
}
