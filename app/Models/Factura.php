<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table="facturas";
    protected $primaryKey="id";
    protected $fillable=['casos_esp', 'cod_auto', 'fecha', 'id_sucursal', 'id_actividad','id_tipodoc','id_user'];
    protected $hidden=['id'];

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
    public function actividad(){
        return $this->belongsTo(Actividad::class);
    }
    public function tipodoc(){
        return $this->belongsTo(Tipo_documento::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function producto(){
        return $this->belongsToMany(Factura::class, 'detalle_facturas');
    }
}
