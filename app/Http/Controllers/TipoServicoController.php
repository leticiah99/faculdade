<?php

namespace App\Http\Controllers;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoServicoController extends Controller
{
    public function create() {  //Retorna a View para criar um item da tabela
        if (Gate::allows('isAdmin')) {
            return view('tipos_servicos.create_tipo_serv');
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function store(Request $request){
        TipoServico::create([
            'id' => $request->id,
            'nome' => $request->nome,
            'preco' => $request->preco,
            
        ]);
        return redirect()->route('listar_tipo_serv')->with('success', 'save');
    }

    public function show(){
        $tipos_servico = TipoServico::all();
        return view('tipos_servicos.list_tipo_serv',['tipos_servicos' => $tipos_servico]);
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $tipos_servico=TipoServico::findOrFail($id);
            $tipos_servico->delete();
            return "Tipo de serviço excluído com sucesso.";
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit($id){
        $tipos_servico = TipoServico::findOrFail($id);
        if (Gate::allows('isAdmin')) {
            return view('tipos_servicos.edit_tipo_serv', ['tipos_servicos' => $tipos_servico]);
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }
    public function update(Request $request, $id){
        $tipos_servico = TipoServico::findOrFail($id);
        $tipos_servico->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
        ]);
        return redirect()->route('listar_tipo_serv')->with('success', 'save');
    }
}
