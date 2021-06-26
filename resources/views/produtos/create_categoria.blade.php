@extends('layouts.dashboard')
@section('content-title', 'CADASTRAR CATEGORIA DE PRODUTOS')

@section('content')
    <div class="container">
        <form action="{{ route('salvar_categoria') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="nome">CATEGORIA</label>
                <input type="text" class="form-control" name="nome" id="nome">                  
            </div>  
            <button type="submit" class="btn btn-success">Cadastrar</button>   
        </form>     
    </div>
@endsection

