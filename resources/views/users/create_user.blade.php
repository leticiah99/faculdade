@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR USUÁRIO')


@section('content')
<!-- CSRF Token --> 
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <form action="{{ route('salvar_user') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="name">NOME</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
            </div>  

            <div class="form-group">               
                <label for="phone">TELEFONE</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" >
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
            </div>  

            <div class="form-group">               
                <label for="email">E-MAIL</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
            </div> 

            <div class="form-group">               
                <label for="password">SENHA</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
            </div> 
 
            <div class="form-group">               
                <label for="password_confirmation">CONFIRMAR SENHA</label>
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" >
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
            </div>    

            <div class="form-group">
                <label for="role">TIPO DE USUÁRIO</label>
                <select name="role" id="role"  class="form-select @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role">
                    <option value="">Selecione o tipo de usuário</option>
                    <option value="1">Administrador</option>
                    <option value="2">Funcionário</option>    
                </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
            </div>
            <br>
            <button type="submit" class="btn btn-success mr-2">Cadastrar</button>  
            <a href="{{route ('listar_user')}}" class="btn btn-danger"> Cancelar</a>     
    </div>
@endsection
