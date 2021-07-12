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
                <label for="phone">TELEFONE</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">                  
            </div> 
        </div>

        <div class="col-md-6">
            <div class="form-group">               
                <label for="email">E-MAIL</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">                  
            </div> 
        </div>

        <div class="form-group" hidden>
                <label for="">CARGO</label>
                <select name="role" id="role" class="form-select">             
                    <option value="{{$user->role}}" selected>{{$user->role}}</option>
                    <option value="Funcionário">Funcionário</option>
                    <option value="Admin">Admin</option>
                </select>
        </div>   
    </div>
<br>
            <button type="submit" class="btn btn-success">Salvar</button> 
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_user') }}">Cancelar</a> 
        
       
    </div>
@endsection
