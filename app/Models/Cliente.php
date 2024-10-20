<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table="clientes";
    protected $primaryKey="id";
    protected $fillable=['','email','','celular','telefono','id_user','tipodoc_id'];
    protected $hidden=['id'];
    public function tipo_documento(){
        return $this->belongsTo(Tipo_documento::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
