<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table='ordem_servicos';
    protected $fillable = ['data_inicial', 'hora', 'data_final', 'status', 'descricao', 'forma_pagamento', 'valor_pago', 'cliente_id'];

    public function produtos(){
        return $this->belongsToMany(Produto::class)->withPivot('valor', 'quantidade')->withTimestamps(); //relacionamento many to many
    } 

    public function servicos(){
        return $this->belongsToMany(TipoServico::class)->withPivot('valor', 'quantidade'); //relacionamento many to many
    } 

    
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    } 


    public function search($filter = null){

        $results = $this->where(function ($query) use ($filter){
            if($filter){
                $query->where('status', 'LIKE', "%{$filter}%");
                //$query->where('marca', 'LIKE', "%{$filter}%");
               // $query->where('marca', '=', $filter);
            }
 
        } )->paginate();

        return $results; 
 
    }

  

    /*
    public function getProdutos($id = null)
    {
        $this->db->select('ordem_servico_produto.*, produtos.*');
        $this->db->from('ordem_servico_produto');
        $this->db->join('produtos', 'produtos.id = ordem_servico_produto.produto_id');
        $this->db->where('ordem_servico_id', $id);

        return $this->db->get()->result();
    }

    public function getServicos($id = null)
    {
        $this->db->select('ordem_servico_tipo_servico.*, tipo_servicos.nome, tipo_servicos.preco as precoVenda');
        $this->db->from('ordem_servico_tipo_servico');
        $this->db->join('servicos', 'servicos.id = ordem_servico_tipo_servico.tipo_servico_id');
        $this->db->where('ordem_servico_id', $id);

        return $this->db->get()->result();
    }*/

    /*
    public function valorTotalOS($id = null)
    {
        $totalServico = 0;
        $totalProdutos = 0;
        if ($servicos = $this->getServicos($id)) {
            foreach ($servicos as $s) {
                $preco = $s->preco ?: $s->precoVenda;
                $totalServico = $totalServico + ($preco * ($s->quantidade ?: 1));
            }
        }
        if ($produtos = $this->getProdutos($id)) {
            foreach ($produtos as $p) {
                $totalProdutos = $totalProdutos + $p->subTotal;
            }
        }

        return ['totalServico' => $totalServico, 'totalProdutos' => $totalProdutos];
    }*/
 


}
 
?> 

