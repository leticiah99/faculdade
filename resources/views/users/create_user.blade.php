@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR USUÁRIO')
@section('scriptjs')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mask.js') }}"></script>
<link href="https://code.jquery.com/jquery-3.3.1.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       $('#phone').mask('(99)99999-9999');
    </script>
@endsection

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
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
                    <option value="Admin">Administrador</option>
                    <option value="Funcionário">Funcionário</option>    
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
