@extends('layouts.dashboard') 
@section('content-title', 'EDITAR CIDADE')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_cidade', ['id' => $cidade->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="nome">CIDADE</label>
                <input type="text" class="form-control" name="nome" id="nome"  value="{{$cidade->nome}}">        
            </div>  
            
            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_cidade') }}">Cancelar</a> 
       
    </div>
@endsection
 