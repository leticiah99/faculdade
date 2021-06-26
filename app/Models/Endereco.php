<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table='enderecos';
    protected $fillable = ['logradouro', 'numero', 'complemento', 'ponto_referencia', 'bairro', 'cidade_id'];

    public function cidade(){
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class, 'endereco_id', 'id');
    }   

    public function user(){
        return $this->hasOne(User::class, 'endereco_id', 'id');
    }  
}
   
