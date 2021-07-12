<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{ 
    protected $table='produtos';
    protected $fillable = ['marca', 'nome', 'voltagem', 'modelo', 'quantidade', 'valor_unit_custo', 'valor_unit_venda', 'categoria_produto_id'];

    public function categoria(){
        return $this->belongsTo(CategoriaProduto::class, 'categoria_produto_id');
    }  

    public function ordens(){
        return $this->belongsToMany(OrdemServico::class)->withPivot('valor', 'quantidade')->withTimestamps();//relacionamento many to many
    }  
 
    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('nome', 'LIKE', "%{$filter}%");
            } 
 
        })->paginate(10);

        return $results; 
 
    }
}
 
