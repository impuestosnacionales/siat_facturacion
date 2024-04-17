<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table="productos";
    protected $primaryKey="id";
    protected $fillable=['Codigo_Producto_SIN', 'Codigo_Actividad_CAEB', 'Descripcion_o_producto_SIN', 'id_contribuyente'];
    protected $hidde=['id'];
    public function contribuyente(){
        return $this->belongsTo(Contribuyente::class);
    }
}
