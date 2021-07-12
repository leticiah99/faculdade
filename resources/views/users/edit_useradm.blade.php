@extends('layouts.dashboard') 
@section('content-title', 'EDITAR USUÁRIO')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_user', ['id' => $user->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="name">NOME</label>
                <input type="text" class="form-control" name="name" id="name"  value="{{$user->name}}">        
            </div>  

            <div class="form-group" hidden>               
                <label for="phone">TELEFONE</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">                  
            </div>  

            <div class="form-group" hidden>               
                <label for="email">E-MAIL</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">                  
            </div>  

            <div class="form-group">
                <label for="">CARGO</label>
                <select name="role" id="role" class="form-select">             
                    <option value="{{$user->role}}" selected>{{$user->role}}</option>
                    <option value="Funcionário">Funcionário</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>    

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <td><a class="btn btn-danger"  href="{{ route('listar_user') }}">Cancelar</a> 
    
    </div>
@endsection
