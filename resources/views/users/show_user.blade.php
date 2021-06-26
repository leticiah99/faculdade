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




    <div class="container-xl"> 
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Endereço') }}</div>
                        <div class="card-body">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" hidden>               
                                        <input type="text" class="form-control" name="endereco_id" id="endereco_id"  value="{{$user->endereco_id}}" style="background-color:white" disabled>        
                                    </div> 
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="logradouro">LOGRADOURO</label>
                                        <input type="text" class="form-control" name="logradouro" id="logradouro"  value="{{$user->logradouro}}" style="background-color:white" disabled>        
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">               
                                        <label for="numero">NÚMERO</label>
                                        <input type="text" class="form-control" name="numero" id="numero"  value="{{$user->numero}}" style="background-color:white" disabled>        
                                    </div> 
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">               
                                        <label for="complemento">COMPLEMENTO</label>
                                        <input type="text" class="form-control" name="complemento" id="complemento"  value="{{$user->complemento}}" style="background-color:white" disabled>        
                                    </div> 
                                </div>

                                    <div class="form-group">               
                                        <label for="bairro">BAIRRO</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro"  value="{{$user->bairro}}" style="background-color:white" disabled>        
                                    </div> 

                                <div class="col-md-10">
                                    <div class="form-group">               
                                        <label for="cidade">CIDADE</label>
                                        <input type="text" class="form-control" name="cidade" id="cidade"  value="{{$user->cidade}}" style="background-color:white" disabled>        
                                    </div> 
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">               
                                        <label for="estado">ESTADO</label>
                                        <input type="text" class="form-control" name="estado" id="estado"  value="{{$user->estado}}" style="background-color:white" disabled>        
                                    </div> 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    <br>
   
         
    <td><a class="btn btn-primary" href="{{ route('editar_user', ['id'=>$user->id])}}"
                                title="Editar usuário {{ $user->name }}" >Editar</a></td>    
        
</div>

@endsection
