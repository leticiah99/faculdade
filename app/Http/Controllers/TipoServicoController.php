<?php
namespace App\Http\Controllers;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TipoServicoController extends Controller
{
    public function index(){
        $tipos_servico = TipoServico::all();
        return view('tipos_servicos.list_tipo_serv',['tipos_servicos' => $tipos_servico]);
    }

    public function create(Request $request) {  
        if (Gate::allows('isAdmin')) {
            return view('tipos_servicos.create_tipo_serv');
        }else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_tipo_serv'); 
        }    
    }

    public function store(Request $request){
        TipoServico::create([
            'id' => $request->id,
            'nome' => $request->nome,
            'preco' => $request->preco,
            
        ]);
        $request->session()->flash('alert-success', 'Tipo de serviço cadastrado com sucesso.');
        return redirect()->route('listar_tipo_serv');
    }

    public function destroy($id, Request $request){
        if (Gate::allows('isAdmin')) {
            $tipos_servico=TipoServico::findOrFail($id);
            $tipos_servico->delete();
            $request->session()->flash('alert-success', 'Tipo de serviço excluído com sucesso.');
        return redirect()->route('listar_tipo_serv');
        }else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_tipo_serv');   
        }    
    } 

    public function edit($id){
        $tipos_servico = TipoServico::findOrFail($id);
        if (Gate::allows('isAdmin')) {
            return view('tipos_servicos.edit_tipo_serv', ['tipos_servicos' => $tipos_servico]);
        }else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_tipo_serv');   
        }    
    }
    public function update(Request $request, $id){
        $tipos_servico = TipoServico::findOrFail($id);
        $tipos_servico->update([
            'nome' => $request->nome,
            'preco' => $request->preco,
        ]);
        $request->session()->flash('alert-success', 'Tipo de serviço atualizado com sucesso.');
        return redirect()->route('listar_tipo_serv');
    }
}
