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
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function store(Request $request){
        CategoriaProduto::create([
            'id' => $request->id,
            'nome' => $request->nome,
            
        ]);
        //return "Categoria cadastrada com sucesso";
        //return redirect()->route('listar_categoria')->with('Categoria cadastrada com sucesso.');
        //return redirect('/dashboard')->with('status', 'Profile updated!');
        return redirect()->route('listar_categoria')->with('success', 'save');


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

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $categoria=CategoriaProduto::findOrFail($id);
            $categoria->delete();
            return "Categoria excluída com sucesso.";
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function edit($id){
        $categoria = CategoriaProduto::findOrFail($id);
        if (Gate::allows('isAdmin')) {
        return view('produtos.edit_categoria', ['categoria' => $categoria]);
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    public function update(Request $request, $id){
        $categoria = CategoriaProduto::findOrFail($id);
        $categoria->update([
            'nome' => $request->nome,
        ]);
        return redirect()->route('listar_categoria')->with('success', 'save');
    }
}
