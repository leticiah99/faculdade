@extends('layouts.dashboard') 
@section('content-title', 'EDITAR PERFIL')

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

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach 
    </div> 

        <form action="{{ route('atualizar_user', ['id' => $user->id]) }}" method="post">   
        @csrf

    <div class= "row">
        <div class="col-md-12">
            <div class="form-group">               
                <label for="name">NOME</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror           
            </div>
        </div>  

        <div class="col-md-6">
            <div class="form-group">               
                <label for="phone">TELEFONE</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" >
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                 
            </div> 
        </div>

        <div class="col-md-6">
            <div class="form-group">               
                <label for="email">E-MAIL</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
            </div> 
        </div>

        <div class="form-group">
                <label for="">TIPO DE USUÁRIO</label>
                <select name="role" id="role"  class="form-select @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role"> 
                    <option value="{{$user->role}}" selected>{{$user->role}}</option>
                    <option value="Admin">Administrador</option>
                    <option value="Funcionário">Funcionário</option>  
                </select>
                @error('role')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
            </div>   

    </div>
<br>

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_user')}}" class="btn btn-danger"> Cancelar</a>    
    </div>
@endsection
