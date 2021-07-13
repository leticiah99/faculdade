<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
use App\Models\Produto;
use Illuminate\Support\Facades\Gate; 
 
class CategoriaProdutoController extends Controller 
{     
    public function index() {   //lista os dados da tabela
        $categorias = CategoriaProduto::all();
        $total = CategoriaProduto::all()->count();
        return view('produtos.list_categoria', compact('categorias', 'total'));
    }

    public function create() {  //Retorna a View para criar um item da tabela
        if (Gate::allows('isAdmin')) {
            return view('produtos.create_categoria');
        } else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_categoria');        
        }    
    }

    public function store(Request $request){
        CategoriaProduto::create([
            'id' => $request->id,
            'nome' => $request->nome,
            
        ]);
        $request->session()->flash('alert-success', 'Categoria de produto cadastrada com sucesso.');
        return redirect()->route('listar_categoria');
    }

    public function show(){
        $categorias = CategoriaProduto::all();
        return view('produtos.list_categoria',['categorias' => $categorias]);

        $produtos = $categoria->categorias()->get();

        if($produtos){

            foreach($produtos as $produto){
            return view('produtos.list_produto',['produtos' => $produtos]);
            
            }
        }

    }

    public function destroy($id, Request $request){
        if (Gate::allows('isAdmin')) {
            $categoria=CategoriaProduto::findOrFail($id);
            $categoria->delete();
            $request->session()->flash('alert-success', 'Categoria de produto excluída com sucesso.');
            return redirect()->route('listar_categoria');
        } else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_categoria');
        }    
    }

    public function edit($id){
        $categoria = CategoriaProduto::findOrFail($id);
        if (Gate::allows('isAdmin')) {
        return view('produtos.edit_categoria', ['categoria' => $categoria]);
        } else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_categoria');        }    
    }

    public function update(Request $request, $id){
        $categoria = CategoriaProduto::findOrFail($id);
        $categoria->update([
            'nome' => $request->nome,
        ]);
        $request->session()->flash('alert-success', 'Categoria de produto atualizada com sucesso.');
        return redirect()->route('listar_categoria');
    }
}
