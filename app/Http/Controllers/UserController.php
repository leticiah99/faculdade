<?php
/*
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
*/
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
            return "Você não tem permissão para realizar esta operação.";
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
        return view('users.list_user');
    }

    
    
    public function show(){
        if (Gate::allows('isAdmin')) {
        $users = User::all();
        return view('users.list_user',['users' => $users]);
        }
        else {
          return "Você não tem permissão para realizar esta operação."; // return view de dados pessoais 
        }
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
        return "Usuário atualizado com sucesso."; 

        //return redirect()->route('detalhar_user')->with('success', 'save');
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
        return "Perfil atualizado com sucesso."; 

        //return redirect()->route('detalhar_user')->with('success', 'save');
    }


    public function search(Request $request){
        $users = $this->repository->search($request->filter);

        return view('users.list_user', [
            'users' => $users,
        ]); 

    }   

} 
