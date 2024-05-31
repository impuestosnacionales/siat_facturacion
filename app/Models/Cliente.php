<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table="clientes";
    protected $primaryKey="id";
    protected $fillable=['razon_social','email','nit','celular','telefono','complemento','tipodoc_id'];
    protected $hidden=['id'];
    public function tipo_documento(){
        return $this->belongsTo(Tipo_documento::class);
    }
}
