<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Endereco;
use App\Models\Cidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
 
class UserController extends Controller  
{  
    protected $request;
    private $repository;

        public function __construct(Request $request, User $user){
            $this->request = $request;
            $this->repository = $user;
        }  

        public function index(User $user){
            $users = $user->all();
            return view('users.list_user', compact('users'));
    
        } 

       

    /*
    public function create() {  //Retorna a View para criar um item da tabela
        if (Gate::allows('isAdmin')) {
            return view('users.create_user');
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }*/

    public function create(User $user) {  //Retorna a View para criar um item da tabela
        $cidades = Cidade::all(); //========  

        if (Gate::allows('isAdmin')) {
        return view('users.create_user', compact('user', 'cidades'));
        }else {
            return "Você não tem permissão para realizar esta operação.";
        }   
    } 

    /*
    // funcao para salvar os dados
    public function store(Request $request){
        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'remember_token' => $request->remember_token,
            'role' => $request->role, 
            'endereco_id' => $request->endereco_id,   
        ]);
            return "Usuário cadastrado com sucesso.";
    } */
    
    
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
        $endereco_id= $endereco->id;

        $user = new User();
        $user->id = $request->get('id');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->remember_token = $request->get('remember_token');
        $user->role = $request->get('role');
        $user->endereco_id = $endereco_id;
        $user->save();

        return redirect()->route('listar_users');

        //return  "Cliente cadastrado com sucesso.";
    }
    

    /*
    public function show(){
        if (Gate::allows('isAdmin')) {
        $users = User::all();
        return view('users.list_user',['users' => $users]);
        }
        else {
          return "Você não tem permissão para realizar esta operação."; // return view de dados pessoais 
        }
    }*/

    public function show($id){
        //$cliente = Cliente::find($cliente->id);
        $user = User::with('endereco')->find($id);

        return view('users.show_user',  ['user' => $user]);
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $usuario=User::findOrFail($id);
            $usuario->delete();
            return "Usuário excluído com sucesso.";
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }

    /*
    public function edit($id){
        $user = User::findOrFail($id); 
        if (Gate::allows('isAdmin')) {
            
            return view('users.edit_useradm', ['user' => $user]);
       
        } else { 
            return view('users.edit_user', ['user' => $user]);
        }
    }
    */

    public function edit(User $user, $id){
        $cidades = Cidade::all(); //========

        if (Gate::allows('isAdmin')) {
            $user = User::findOrFail($id); 
            return view('users.edit_user', compact('user', 'cidades')); 
        } else {
            return "Você não tem permissão para realizar esta operação.";
        }    
    }


   /*
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $endereco_id = $request->input('endereco_id');

        
        User::find($id)->update($dataForm);
        Endereco::find($endereco_id)->update($dataForm);

        return "Cliente atualizado com sucesso."; 
   
    } */

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
           'name' => $request->name,
           'email' => $request->email,
           //'role' => $request->role,
           'logradouro' => $request->logradouro,
           'numero' => $request->numero,
           'complemento' => $request->complemento,
           'bairro' => $request->bairro,
           'cidade' => $request->cidade,

        ]);
        return "Usuário atualizado com sucesso."; 

        //return redirect()->route('detalhar_user')->with('success', 'save');
    }



    

    public function search(Request $request){
        $users = $this->repository->search($request->filter);

        return view('users.list_user', [
            'users' => $users,
        ]); 

    }

    

} 
