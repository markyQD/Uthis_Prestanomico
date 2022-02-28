<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_Domicilio extends Model
{
    protected $table = 'datos_domicilio';

    protected $fillable  = ['cliente_id','calle','no_exterior',
    'no_interior','colonia','municipio',
    'estado','cp','actualizado'];
 
    protected $PK = 'cliente_id';
}
