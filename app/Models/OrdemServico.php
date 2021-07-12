<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model 
{
    protected $table='ordem_servicos';
    protected $fillable = ['data_inicial', 'hora', 'data_final', 'status', 'descricao', 'forma_pagamento', 'valor_pago', 'cliente_id', 'produto_id', 'servico_id', 'user_id'];

    public function produtos(){
        return $this->belongsToMany(Produto::class)->withPivot('valor', 'quantidade')->withTimestamps(); //relacionamento many to many
    } 

    public function servicos(){
        return $this->belongsToMany(TipoServico::class)->withPivot('valor', 'quantidade'); //relacionamento many to many
    } 

    
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    } 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    } 


    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('status', '=', "{$filter}");
                //$query->where('marca', 'LIKE', "%{$filter}%");
               // $query->where('marca', '=', $filter);
            }
 
        } )->paginate(10);

        return $results;  
 
    }


}
 
?> 

