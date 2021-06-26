@extends('layouts.dashboard') 
@section('content-title', 'EDITAR ESTADO')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_estado', ['id' => $estado->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="nome">UF</label>
                <input type="text" class="form-control" name="uf" id="uf"  value="{{$estado->uf}}">        
            </div>  

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_estado') }}">Cancelar</a> 
       
    </div>
@endsection  
