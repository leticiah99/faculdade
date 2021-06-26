@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR USUÁRIO')


@section('content')
    <div class="container">
        <form action="{{ route('salvar_user') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="name">NOME</label>
                <input type="text" class="form-control" name="name" id="name">                  
            </div>  

            <div class="form-group">               
                <label for="email">E-MAIL</label>
                <input type="text" class="form-control" name="email" id="email">                  
            </div> 

            <div class="form-group">               
                <label for="password">SENHA</label>
                <input type="password" class="form-control" name="password" id="password">                  
            </div> 

            <div class="form-group">               
                <label for="password">CONFIRMAR SENHA</label>
                <input type="password" class="form-control" name="password" id="password">                  
            </div>    

            <div class="form-group">
                <label for="">CARGO</label>
                <select name="role" id=""  class="form-control">
                    <option value=""></option>
                    <option value="1">Funcionário</option>
                    <option value="2">Admin</option>
                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>        
    </div>
@endsection
