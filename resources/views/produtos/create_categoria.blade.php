@extends('layouts.dashboard')
@section('content-title', 'CADASTRAR CATEGORIA DE PRODUTOS')

@section('content')
    <div class="container">
        <form action="{{ route('salvar_categoria') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="nome">CATEGORIA</label>
                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                     
            </div>  
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>  
            <a href="{{route ('listar_categoria')}}" class="btn btn-danger">Cancelar</a>
 
        </form>     
    </div>
@endsection

