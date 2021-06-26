@extends('layouts.dashboard') 
@section('content-title', 'EDITAR CATEGORIA DE PRODUTO')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_categoria', ['id' => $categoria->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="nome">CATEGORIA</label>
                <input type="text" class="form-control" name="nome" id="nome"  value="{{$categoria->nome}}">        
            </div>  

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button>  
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_categoria') }}">Cancelar</a> 
      
    </div>
@endsection
