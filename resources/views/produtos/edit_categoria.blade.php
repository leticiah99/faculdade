@extends('layouts.dashboard') 
@section('content-title', 'EDITAR CATEGORIA DE PRODUTO')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_categoria', ['id' => $categoria->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="nome">CATEGORIA</label>
                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{$categoria->nome}}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror        
            </div>  

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_categoria')}}" class="btn btn-danger"> Cancelar</a>
    
    </div>
@endsection
