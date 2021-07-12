@extends('layouts.dashboard') 
@section('content-title', 'DADOS DO USUÁRIO')


@section('content')

    <div class="container-xl"> 
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dados pessoais') }}</div>
                        <div class="card-body">
                            
                            <div class= "row">
                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="name">NOME</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{$user->name}}" style="background-color:white"disabled>        
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="phone">TELEFONE</label>
                                        <input type="text" class="form-control" name="phone" id="phone"  value="{{$user->phone}}" style="background-color:white"disabled>        
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="email">E-MAIL</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" style="background-color:white" disabled>                  
                                    </div> 
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    
    <br><br>
   
         
    <td><a class="btn btn-primary" href="{{ route('editar_user', ['id'=>$user->id])}}"
                                title="Editar usuário {{ $user->name }}" >Editar</a></td>    
        
</div>

@endsection
