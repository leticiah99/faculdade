<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable = ['nome', 'telefone', 'endereco_id'];

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }  
    
    public function ordens(){
        return $this->hasMany(OrdemServico::class);
    }
 
    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('nome', 'LIKE', "%{$filter}%");
               
            }
 
        } )->paginate();

        return $results; 
 
    }
}
?>
