<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

 
class UserController extends Controller  
{  
    use RegistersUsers;
    protected $request;
    private $repository;

        public function __construct(Request $request, User $user){
            $this->request = $request;
            $this->repository = $user;
        }  

        public function index(User $user){
            $users = $user->paginate(10);
            return view('users.list_user', compact('users'));
    
        } 

    public function create() {  //Retorna a View para criar um item da tabela
        if (Gate::allows('isAdmin')) {
            return view('users.create_user');
        } else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_user');
        }    
    }
  
    
    protected function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'role' => 'required',   
            //'password' => 'required',
             
        ]);
        
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' =>  bcrypt('password')
                   
        ]); 
        $request->session()->flash('alert-success', 'Usuário cadastrado com sucesso.');
        return redirect()->route('listar_user');

    }
    
    public function show(){
        if (Gate::allows('isAdmin')) {
        $users = User::all();
        return view('users.list_user',['users' => $users]);
        }
        else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_user');
        }
    }

    public function destroy($id){
        if (Gate::allows('isAdmin')) {
            $usuario=User::findOrFail($id);
            $usuario->delete();
            $request->session()->flash('alert-success', 'Usuário excluído com sucesso.');
            return redirect()->route('listar_user');
        } else {
            $request->session()->flash('alert-danger', 'Você não tem permissão para realizar esta operação..');
            return redirect()->route('listar_user');
        }    
    }

    public function edit($id){
        $user = User::findOrFail($id); 
        if (Gate::allows('isAdmin')) {        
            return view('users.edit_useradm', ['user' => $user]);
       
        } else { 
            return view('users.edit_user', ['user' => $user]);
        }
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
           'name' => $request->name,
           'phone' => $request->phone,
           'email' => $request->email,
           'role' => $request->role,
        ]);
        if($user->update){
        $request->session()->flash('alert-success', 'Usuário atualizado com sucesso.');
        return redirect()->route('listar_user');
        }
        else{
            $request->session()->flash('alert-danger', 'Erro ao atualizar os dados.');
            return redirect()->route('listar_user');
        }

    }

    public function editProfile($id){
        $user = User::findOrFail($id);   
            return view('users.edit_perfil', ['user' => $user]);
    }

    public function updateProfile(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update([
           'name' => $request->name,
           'phone' => $request->phone,
           'email' => $request->email,
           'password' => $request->password,
        ]);
        $request->session()->flash('alert-success', 'Perfil atualizado com sucesso.');
        return redirect()->route('detalhar_user');

    }

    public function search(Request $request){
        $users = $this->repository->search($request->filter);

        return view('users.list_user', [
            'users' => $users,
        ]); 

    }   

} 
