
@extends('layouts.dashboard') 

@section('content-title', 'EDITAR TIPO DE SERVIÇO')

@section('content')
    <div class="container">
    <form action="{{ route('atualizar_tipo_serv', ['id' => $tipos_servicos->id]) }}" method="post"> 
         
        @csrf
        

            <div class="form-group">               
                <label for="nome">NOME</label>
                <input type="text" class="form-control" name="nome" id="nome"  value="{{$tipos_servicos->nome}}">        
            </div>  

            <div class="form-group">               
                <label for="preco">PREÇO</label>
                <input type="text" class="form-control" name="preco" id="preco" value="{{$tipos_servicos->preco}}">                  
            </div> 

            <button type="submit" class="btn btn-success">Salvar</button>  
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_tipo_serv') }}">Cancelar</a> 
      
    </div>
@endsection




