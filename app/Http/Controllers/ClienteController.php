<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Cidade;
use App\Models\OrdemServico;
use PDF;
use DB;

class ClienteController extends Controller
{ 
    protected $request;
    private $repository;

    public function __construct(Request $request, Cliente $cliente){
        $this->request = $request;
        $this->repository = $cliente;
    } 

    public function index(Cliente $cliente){
        $clientes = $cliente::orderBy('nome', 'ASC')->get();
        return view('clientes.list_cliente', compact('clientes'));  
    } 

    public function create(Cliente $cliente) {  
        $cidades = Cidade::all();     
        return view('clientes.create_cliente', compact('cliente', 'cidades', 'ordens'));
    } 

    public function store(Request $request)
    {
        $endereco = new Endereco();
        $endereco->logradouro = $request->get('logradouro');
        $endereco->numero = $request->get('numero');
        $endereco->complemento = $request->get('complemento');
        $endereco->ponto_referencia = $request->get('ponto_referencia');
        $endereco->bairro = $request->get('bairro');
        $endereco->cidade_id = $request->get('cidade_id');
        $endereco->save();
        $endereco_id = $endereco->id;

        $cliente = new Cliente();
        $cliente->id = $request->get('id');
        $cliente->nome = $request->get('nome');
        $cliente->telefone = $request->get('telefone');
        $cliente->endereco_id = $endereco_id;
        $cliente->save();
        $request->session()->flash('alert-success', 'Cliente cadastrado com sucesso.');
        return redirect()->route('listar_cliente');
    }
    
    public function show($id){
        $cliente = Cliente::with('ordens')->find($id);
        return view('clientes.show_cliente',  ['cliente' => $cliente]);
    }

    public function destroy(Request $request, $id){    
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        $request->session()->flash('alert-success', 'Cliente excluído com sucesso.');
        return redirect()->route('listar_cliente');    }

    public function edit(Cliente $cliente, $id){
        $cidades = Cidade::all(); 
        $cliente = Cliente::findOrFail($id); 
        return view('clientes.edit_cliente', compact('cliente', 'cidades'));
    }
 
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $endereco_id = $request->input('endereco_id');    
        Cliente::find($id)->update($dataForm);
        Endereco::find($endereco_id)->update($dataForm);
        $request->session()->flash('alert-success', 'Dados do cliente editados com sucesso.');
        return redirect()->route('listar_cliente'); 
    }

    public function search(Request $request){
        $clientes = $this->repository->search($request->filter);
        return view('clientes.list_cliente', [
            'clientes' => $clientes,
        ]); 
    }
     
    public function geraPdf($id){
        $cliente = Cliente::with('ordens')->find($id);

        $pdf = PDF::loadview('clientes.relatorio', compact('cliente'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf'); 
    }
} 
?>