<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table='cidades';
    protected $fillable = ['nome', 'estado_id'];

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function enderecos(){
        return $this->hasMany(Endereco::class, 'cidade_id', 'id');
    }

    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('nome', 'LIKE', "%{$filter}%");
                //$query->where('marca', 'LIKE', "%{$filter}%");
               // $query->where('marca', '=', $filter);
            } 
 
        } )
        ->paginate();

        return $results; 
 
    }
} 





 