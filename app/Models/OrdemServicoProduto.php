<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemServicoProduto extends Model
{ 
    protected $table='ordem_servico_produtos';
    protected $fillable = [ 'quantidade', 'valor', 'ordem_servico_id', 'produto_id'];
    
    public function produtos(){
      return $this->belongsToMany(Produto::class)->withPivot('valor', 'quantidade')->withTimestamps();//relacionamento many to many
    }

    public function ordens(){
        return $this->belongsToMany(OrdemServico::class)->withPivot('valor', 'quantidade')->withTimestamps();//relacionamento many to many
    }  
 
}
 
