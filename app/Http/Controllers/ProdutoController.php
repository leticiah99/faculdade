<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\CategoriaProduto;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request; 
   
    class ProdutoController extends Controller
    {
        protected $request;
        private $repository;

        public function __construct(Request $request, Produto $produto){
            $this->request = $request;
            $this->repository = $produto;
            $produtos = $produto->all();
        }   

        public function index(Produto $produto){
            $produtos = $produto->all();
            return view('produtos.list_produto', compact('produtos'));
        } 

        public function create(Produto $produto) {  //Retorna a View para criar um item da tabela
            $categorias = CategoriaProduto::all();

            if (Gate::allows('isAdmin')) 
                return view('produtos.create_produto',  compact('produto', 'categorias'));
            else 
                return "Você não tem permissão para realizar esta operação.";   
        }
    
        public function store(Request $request){
            Produto::create([
                'id' => $request->id,
                'marca' => $request->marca,
                'nome' => $request->nome,
                'voltagem' => $request->voltagem,
                'modelo' => $request->modelo,
                'quantidade' => $request->quantidade,
                'valor_unit_custo' => $request->valor_unit_custo,
                'valor_unit_venda' => $request->valor_unit_venda,
                'categoria_produto_id' => $request->categoria_produto_id,      
            ]);
            $request->session()->flash('alert-success', 'Produto cadastrado com sucesso.');
            return redirect()->route('listar_produto');
            //return view('produtos.create_produto',  compact('produto', 'categorias'));

        }

        public function show(Produto $produto, $id){
            $produto = Produto::findOrFail($id); 
            return view('produtos.show_produto',['produto' => $produto]);
        }
    
        public function destroy(Request $request, $id){
            if (Gate::allows('isAdmin')) {
                $produto=Produto::findOrFail($id); 
                $produto->delete();
                //return "Produto excluído com sucesso.";
                $request->session()->flash('alert-success', 'Produto excluído com sucesso.');
                return redirect()->route('listar_produto');

            } else {
                return "Você não tem permissão para realizar esta operação.";
            }    
        }

        public function edit(Produto $produto, $id){ 
            $categorias = CategoriaProduto::all();
                if (Gate::allows('isAdmin')) {
                    $produto = Produto::findOrFail($id); 

                    return view('produtos.edit_produto', compact('produto', 'categorias')); 
                } else {
                    return "Você não tem permissão para realizar esta operação.";
                }    
        } 

        public function update(Request $request, $id){
            $produto = Produto::findOrFail($id);
            $produto->update([           
                'marca' => $request->marca,
                'nome' => $request->nome,
                'voltagem' => $request->voltagem,
                'modelo' => $request->modelo,
                'quantidade' => $request->quantidade,
                'valor_unit_custo' => $request->valor_unit_custo,
                'valor_unit_venda' => $request->valor_unit_venda,
                'categoria_produto_id' => $request->categoria_produto_id,
            ]);            
            $produtos = $produto->all();
            return view('produtos.list_produto',['produtos' => $produtos]);
        }

        public function search(Request $request){
            $produtos = $this->repository->search($request->filter);
            return view('produtos.list_produto', [
                'produtos' => $produtos,
            ]); 
        }         
    } 
     

