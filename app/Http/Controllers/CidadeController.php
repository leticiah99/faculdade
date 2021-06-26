<?php

namespace App\Http\Controllers;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; 

class CidadeController extends Controller
{ 
    protected $request;
    private $repository;

    public function __construct(Request $request, Cidade $cidade){
        $this->request = $request;
        $this->repository = $cidade;
        $cidades = $cidade->all();

    }  

    public function index(Cidade $cidade){
        $cidades = $cidade->all();
        return view('enderecos.list_cidade', compact('cidades'));
    }


    public function create(Cidade $cidade) {  //Retorna a View para criar um item da tabela
        $estados = Estado::all();
        if (Gate::allows('isAdmin')) {
        return view('enderecos.create_cidade', compact('cidade', 'estados'));
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function store(Request $request){
        Cidade::create([
            'id' => $request->id,
            'nome' => $request->nome,
            'estado_id' => $request->estado_id,
            
        ]);
        return redirect()->route('listar_cidade')->with('success', 'save');

    }

    public function show(){
        if (Gate::allows('isAdmin')) {
        $cidades = Cidade::all();
        return view('enderecos.list_cidade',['cidades' => $cidades]);
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
        $cidade=Cidade::findOrFail($id);
        $cidade->delete();
        return "Cidade excluída com sucesso.";
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit($id){
        $cidade = Cidade::findOrFail($id);
        if (Gate::allows('isAdmin')) {
        return view('enderecos.edit_cidade', ['cidade' => $cidade]);
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }
    
    public function update(Request $request, $id){
        $cidade = Cidade::findOrFail($id);
        $cidade->update([
           'nome' => $request->nome,
        ]);
        return redirect()->route('listar_cidade')->with('success', 'save');
    }

    public function search(Request $request){
        $cidades = $this->repository->search($request->filter);

        return view('enderecos.list_cidade', [
            'cidades' => $cidades,
        ]); 

    } 


    

}
