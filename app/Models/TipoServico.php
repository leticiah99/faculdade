<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    protected $table='tipo_servicos';
    protected $fillable = ['nome', 'preco'];

    public function ordens(){
        return $this->belongsToMany(OrdemServico::class)->withPivot('valor', 'quantidade');//relacionamento many to many
    }  
    
}
