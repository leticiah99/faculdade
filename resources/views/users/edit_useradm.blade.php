@extends('layouts.dashboard') 
@section('content-title', 'EDITAR USUÁRIO')

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
    <div class="container">
        <form action="{{ route('atualizar_user', ['id' => $user->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="name">NOME</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror         
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
                    <option value="Admin">Administrador</option>
                    <option value="Funcionário">Funcionário</option>  
                </select>
            </div>    

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <td><a class="btn btn-danger"  href="{{ route('listar_user') }}">Cancelar</a> 
    
    </div>
@endsection
