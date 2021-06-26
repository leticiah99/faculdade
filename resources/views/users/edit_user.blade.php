@extends('layouts.dashboard') 
@section('content-title', 'EDITAR PERFIL')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_user', ['id' => $user->id]) }}" method="post">   
        @csrf

    <div class= "row">
        <div class="col-md-12">
            <div class="form-group">               
                <label for="name">NOME</label>
                <input type="text" class="form-control" name="name" id="name"  value="{{$user->name}}">        
            </div>
        </div>  

        
        <div class="col-md-6">
            <div class="form-group">               
                <label for="email">TELEFONE</label>
                <input type="text" class="form-control" name="email" id="email" value="(47)99999-1111">                  
            </div> 
        </div>

        <div class="col-md-6">
            <div class="form-group">               
                <label for="email">E-MAIL</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">                  
            </div> 
        </div>


<!--
        <div class="col-md-12">
            <div class="form-group" hidden>               
                <input type="text" class="form-control" name="endereco_id" id="endereco_id"  value="{{$user->endereco_id}}">        
            </div> 
        </div>

        <div class="col-md-6">
            <div class="form-group">               
                <label for="logradouro">LOGRADOURO</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro"  value="{{$user->logradouro}}">        
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">               
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" name="numero" id="numero"  value="{{$user->numero}}">        
            </div> 
        </div>

        <div class="col-md-3">
            <div class="form-group">               
                <label for="complemento">COMPLEMENTO</label>
                <input type="text" class="form-control" name="complemento" id="complemento"  value="{{$user->complemento}}">        
            </div> 
        </div>

            <div class="form-group">               
                <label for="bairro">BAIRRO</label>
                <input type="text" class="form-control" name="bairro" id="bairro"  value="{{$user->bairro}}">        
            </div> 

        <div class="col-md-10">
            <div class="form-group">               
                <label for="cidade">CIDADE</label>
                <input type="text" class="form-control" name="cidade" id="cidade"  value="{{$user->cidade}}">        
            </div> 
        </div>

        <div class="col-md-2">
            <div class="form-group">               
                <label for="estado">ESTADO</label>
                <input type="text" class="form-control" name="estado" id="estado"  value="{{$user->estado}}">        
            </div> 
        </div>

        <div class="form-group">
                <label for="">CARGO</label>
                <select name="role" id="role" class="form-select">             
                    <option value="{{$user->role}}" selected>{{$user->role}}</option>
                    <option value="Funcionário">Funcionário</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>   
            -->
    </div>
<br>

            <button type="submit" class="btn btn-success">Salvar</button> 
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_user') }}">Cancelar</a> 
        
       
    </div>
@endsection
