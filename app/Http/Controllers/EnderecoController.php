<?php

namespace App\Http\Controllers;
use App\Models\Endereco;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\User;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    protected $request;
    private $repository;
   
    public function __construct(Request $request, Endereco $endereco){
        $this->request = $request;
        $this->repository = $endereco;
    }  

    public function index(Endereco $endereco){
        $enderecos = $endereco->all();
        return view('enderecos.list_endereco', compact('enderecos')); //===============

    }   //====================

    
    public function create(Endereco $endereco) {  //Retorna a View para criar um item da tabela
        $cidades = Cidade::all();
        if (Gate::allows('isAdmin')) {
        return view('clientes.create_cliente', compact('endereco', 'cidades'));
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }   
     

    public function store(Request $request){
        Endereco::create([
            'id' => $request->id,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'ponto_referencia' => $request->ponto_referencia,
            'bairro' => $request->bairro,
            'cidade_id' => $request->cidade_id,
            
        ]);
        return "Endereço cadastrado com sucesso.";
    }

    public function show(){
        if (Gate::allows('isAdmin')) {
        $enderecos = Endereco::all();
        return view('enderecos.list_endereco',['enderecos' => $enderecos]);
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
        $endereco=Endereco::findOrFail($id);
        $endereco->delete();
        return "Endereço excluído com sucesso.";
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit(Endereco $endereco, $id){
        $cidades = Cidade::all();
        $endereco = Endereco::findOrFail($id);
        if (Gate::allows('isAdmin')) {
        return view('clientes.edit_cliente', compact('endereco', 'cidades')); //=================
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }
   
    public function update(Request $request, $id){
        $endereco = Endereco::findOrFail($id);
        $endereco->update([
           'logradouro' => $request->logradouro,
           'numero' => $request->numero,
           'complemento' => $request->complemento,
           'ponto_referencia' => $request->ponto_referencia,
           'bairro' => $request->bairro,
           'cidade_id' => $request->cidade_id,

        ]);
        return "Endereço atualizado com sucesso."; 
    }
}

