<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_Credito extends Model
{
    protected $table = 'datos_credito';

    protected $fillable  = ['cliente_id','monto','plazo',
    'pago_mensual','tasa_interes'];
 
    protected $PK = 'cliente_id';
}
