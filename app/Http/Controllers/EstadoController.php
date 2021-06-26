<?php

namespace App\Http\Controllers;
use App\Models\Estado; 
use App\Models\Cidade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Estado $estado){
        $this->request = $request;
        $this->repository = $estado;
        $estados = $estado->all();

    }  


    public function index(Estado $estado) {   //lista os dados da tabela
        $estados = Estado::all();
        $total = Estado::all()->count();
        return view('enderecos.list_estado', compact('estados', 'total'));
    }

    public function create() {  //Retorna a View para criar um item da tabela
        if (Gate::allows('isAdmin')) {
        return view('enderecos.create_estado');
        }else {
            return "Você não tem permissão para realizar esta operação."; // return view de dados pessoais 
        }
    }

    public function store(Request $request){
        Estado::create([
            'id' => $request->id,
            'uf' => $request->uf,
            
        ]);
        return "Estado cadastrado com sucesso";
    }

    public function show(){
        if (Gate::allows('isAdmin')) {
            $estados = Estado::all();
            return view('enderecos.list_estado',['estados' => $estados]);

            $cidades = $estado->cidades()->get();

            if($cidades){

                foreach($cidades as $cidade){
                return view('enderecos.list_cidade',['cidades' => $cidades]);
                }
            }

        } else {
            return "Você não tem permissão para realizar esta operação."; // return view de dados pessoais 
        }

    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $estado=Estado::findOrFail($id);
            $estado->delete();
            return "Estado excluído com sucesso.";    
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit($id){
        $estado = Estado::findOrFail($id);
        if (Gate::allows('isAdmin')) {
            return view('enderecos.edit_estado', ['estado' => $estado]);
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    } 

 

    public function update(Request $request, $id){
        $estado = Estado::findOrFail($id);
        $estado->update([
            'uf' => $request->uf,
        ]);
        return "Estado atualizado com sucesso.";
    }

    public function search(Request $request){
        $estados = $this->repository->search($request->filter);

        return view('enderecos.list_estado', [
            'estados' => $estados,
        ]); 

    }

}

