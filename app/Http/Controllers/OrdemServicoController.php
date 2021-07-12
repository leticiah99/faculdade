<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\OrdemServico;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\OrdemServicoProduto;
use App\Models\TipoServico;
use Illuminate\Support\Facades\Gate; 
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request; 
use PDF;

class OrdemServicoController extends Controller
{
    protected $request;
    private $repository; 

    public function __construct(Request $request, OrdemServico $ordemServico){
        $this->request = $request;
        $this->repository = $ordemServico;
        $ordens = $ordemServico->all();
    }  

    public function index(OrdemServico $ordemServico){
       $ordens = OrdemServico::orderBy('created_at', 'DESC')->paginate(10);

        return view('ordens.list_ordem', compact('ordens'));
    }  


    public function create(OrdemServico $ordemServico) {  //Retorna a View para criar um item da tabela
        $clientes = Cliente::all();
        $user = Auth::user();
        return view('ordens.create_ordem', compact('ordemServico', 'clientes', 'users'));
        
    } 

     
    public function store(Request $request){
        $user = Auth::user();

        $ordemServico = OrdemServico::create([
            'id' => $request->id,    
            'descricao' => $request->descricao,
            'status' => $request->status,
            //'forma_pagamento' => $request->forma_pagamento,
            //'valor_pago' => $request->valor_pago,
            'cliente_id' => $request->cliente_id,
            'user_id' => auth()->id(),
            'data_inicial' =>  $request->data_inicial,
            'hora' =>  $request->hora,            
        ]);
        $request->session()->flash('alert-success', 'Ordem de serviço cadastrada com sucesso.');
        return redirect()->route('detalhar_ordem', ['id' => $ordemServico->id]);
    }

    public function show(OrdemServico $ordemServico, $id){
        $ordemServico = OrdemServico::findOrFail($id);
        return view('ordens.show_ordem',['ordemServico' => $ordemServico]);
    }
 
    public function destroy($id, Request $request){
        if (Gate::allows('isAdmin')) {
            $ordemServico=OrdemServico::findOrFail($id);
            $ordemServico->delete();
            $request->session()->flash('alert-success', 'Ordem de serviço excluída com sucesso.');
            return redirect()->route('listar_ordem');
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit(OrdemServico $ordemServico, $id){
        $clientes = Cliente::all();
        $ordemServico = OrdemServico::findOrFail($id);
        return view('ordens.edit_ordem', compact('ordemServico', 'clientes')); 
    }

    public function update(Request $request, $id){
        $ordemServico = OrdemServico::findOrFail($id);
        $ordemServico->update([
            'data_inicial' => $request->data_inicial,
            'data_final' => $request->data_final,
            'hora' => $request->hora,
            'descricao' => $request->descricao,
            'tipo_servico' => $request->tipo_servico,
            'status' => $request->status,
            'forma_pagamento' => $request->forma_pagamento,
            'valor_pago' => $request->valor_pago,
            'cliente_id' => $request->cliente_id,
            
        ]);
        $ordens = $ordemServico->all();
        $request->session()->flash('alert-success', 'Ordem de serviço atualizada com sucesso.');
        return redirect()->route('listar_ordem');
    } 

    public function finalizar(Request $request, $id){
        $ordemServico = OrdemServico::findOrFail($id);
        $ordemServico->update([       
            'status' => 'Finalizado',
            'forma_pagamento' => $request->forma_pagamento,
            'data_final' => $request->data_final,
            'valor_pago' => $request->valor_pago,
                 
        ]);
        
        $request->session()->flash('alert-success', 'Ordem de serviço finalizada com sucesso.');
        return redirect()->route('detalhar_ordem' , ['id' => $ordemServico->id]);
    }

//==================================================================================================//

    public function addProduto($id){
        $ordemServico = OrdemServico::find($id);
        $produtos = Produto::all();

            if(!$produtos){
                return "Nenhum produto encontrado";
            }
            if(!$ordemServico){
                return "Erro ao adicionar produto";
            }
         return view('ordens.add_produto',['ordemServico' => $ordemServico, 'produtos' => $produtos]);
    }

    public function addProdutoSave($id, Request $request){

        $ordemServico = OrdemServico::find($id);
 
        if(!$ordemServico){
            return "Erro ao adicionar produto";
        }

        $produto = Produto::find($request->produto);

        $valor_final = $produto->valor_unit_venda * $request->quantidade;  

        $ordemServico->produtos()->attach($produto,  ['valor' => $valor_final, 'quantidade' => $request->quantidade ]);
       
        foreach($ordemServico->produtos as $produto){
            $produto->quantidade = $produto->quantidade - $request->quantidade; 

        }
        
        return redirect()->route('adicionar_produto', ['id' => $ordemServico->id]);

    } 

    public function removeProduto($id, $produto_id){

        $ordemServico = OrdemServico::with('produtos')->find($id);

        if(!$ordemServico)
            return "Erro ao remover produto";
        

        $produto = Produto::find($produto_id);

        if(!$produto)
            return "Erro ao remover o produto.";

        $ordemServico->produtos()->detach($produto);


        return redirect()->route('adicionar_produto', ['id' => $ordemServico->id]);

    } 

//==================================================================================================//
    public function addServico($id){
        $ordemServico = OrdemServico::find($id);
        $servicos = TipoServico::all();

            if(!$servicos){
                return "Nenhum serviço encontrado";
            }
            if(!$ordemServico){
                return "Erro ao adicionar produto";
            }
        return view('ordens.add_servico',['ordemServico' => $ordemServico, 'servicos' => $servicos]);
    }

    public function addServicoSave($id, Request $request){

        $ordemServico = OrdemServico::find($id);

        if(!$ordemServico){
            return "Erro ao adicionar servico";
        }

        $servico = TipoServico::find($request->servico);

        $valor_final = $servico->preco * $request->quantidade;  
        $ordemServico->servicos()->attach($servico, ['valor' => $valor_final, 'quantidade' => $request->quantidade]);

        return redirect()->route('adicionar_servico', ['id' => $ordemServico->id]);

    }

    public function removeServico($id, $tipo_servico_id){

        $ordemServico = OrdemServico::with('servicos')->find($id);

        if(!$ordemServico)
            return "Erro ao remover serviço";

        $servico = TipoServico::find($tipo_servico_id);

        if(!$servico)
            return "Erro ao remover o serviço.";

        $ordemServico->servicos()->detach($servico);

        return redirect()->route('adicionar_servico', ['id' => $ordemServico->id]);
 
    }

 
    public function search(Request $request){
        //$status = '%' .$request->status;
        $ordens = OrdemServico::where('data_inicial', '=', $request->data_inicial)->orWhere('status', '=', $request->status)->paginate(10);
      
        return view('ordens.list_ordem', ['ordens' => $ordens]);  
    }

    
    public function geraPdfOs(Request $request){
        $ordens = OrdemServico::orderBy('data_inicial', 'ASC')->get();
        $pdf = PDF::loadview('ordens.relatorio_geral', compact('ordens'));

       return $pdf->setPaper('a4')->stream('Relatório.pdf'); 
    }
    
    
    public function geraPdfEsp(Request $request){
        $status = '%' .$request->status;
        $data_inicial = $request->dataInicial;
        $data_final = $request->dataFinal;
        $ordens = OrdemServico::where('data_inicial', '>=', $data_inicial)->where('data_inicial', '<=', $data_final)->orWhere('status', 'LIKE', $status)->get();     

        $pdf = PDF::loadview('ordens.relatorio', ['ordens' => $ordens,  'dataInicial' => $data_inicial, 'dataFinal' => $data_final]);

        return $pdf->setPaper('a4')->stream('Relatório.pdf'); 
    }

}
?>
