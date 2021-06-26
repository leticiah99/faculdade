<?php

namespace App\Http\Controllers;
use App\Models\OrdemServico;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\OrdemServicoProduto;
use App\Models\TipoServico;
use Illuminate\Support\Facades\Gate; 
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;



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
        $ordens = OrdemServico::orderBy('created_at', 'DESC')->get();
        return view('ordens.list_ordem', compact('ordens'));
    } 


   

    public function create(OrdemServico $ordemServico) {  //Retorna a View para criar um item da tabela
        $clientes = Cliente::all();

        if (Gate::allows('isAdmin')) {
            return view('ordens.create_ordem', compact('ordemServico', 'clientes'));
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    
    public function store(Request $request){
        $ordemServico = OrdemServico::create([
            'id' => $request->id,    
            'descricao' => $request->descricao,
            'status' => $request->status,
            'forma_pagamento' => $request->forma_pagamento,
            'valor_pago' => $request->valor_pago,
            'cliente_id' => $request->cliente_id,
            'data_inicial' =>  $request->data_inicial,
            'hora' =>  $request->hora,            
        ]);

       return redirect()->route('detalhar_ordem', ['id' => $ordemServico->id]);
    }

    public function show(OrdemServico $ordemServico, $id){
        
        $ordemServico = OrdemServico::findOrFail($id);
       
        return view('ordens.show_ordem',['ordemServico' => $ordemServico]);
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $ordemServico=OrdemServico::findOrFail($id);
            $ordemServico->delete();

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
            'hora' => $request->hora,
            'descricao' => $request->descricao,
            'tipo_servico' => $request->tipo_servico,
            'status' => $request->status,
            'forma_pagamento' => $request->forma_pagamento,
            'valor_pago' => $request->valor_pago,
            'cliente_id' => $request->cliente_id,
            
        ]);
        $ordens = $ordemServico->all();

        return "Ordem de serviço atualizada com sucesso.";
        //return redirect()->route('ordens.edit_ordem', ['id' => $ordemServico->id]);

        //return view('produtos.list_produto',['produtos' => $produtos]);
    } 

    public function finalizar(Request $request, $id){
        $ordemServico = OrdemServico::findOrFail($id);
        $ordemServico->update([
            
            'status' => 'Finalizado',
            'forma_pagamento' => $request->forma_pagamento,
            'data_final' => $request->data_final,
            'valor_pago' => $request->valor_pago,
            'cliente_id' => $id,
            
        ]);
        //$ordens = $ordemServico->all();
        

        //echo $request->status;
        

        return "Ordem de serviço finalizada com sucesso.";
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

        $ordemServico->servicos()->attach($servico, ['valor' => $servico->preco ]);


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
        $ordens = $this->repository->search($request->filter);
      
        return view('ordens.list_ordem', ['ordens' => $ordens]); 
    }
}
?>
