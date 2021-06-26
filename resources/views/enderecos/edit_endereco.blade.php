@extends('layouts.dashboard') 
@section('content-title', 'EDITAR ENDEREÇO')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_endereco', ['id' => $endereco->id]) }}" method="post">
        
        @csrf

            <div class="form-group">               
                <label for="logradouro">LOGRADOURO</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro"  value="{{$endereco->logradouro}}">        
            </div>  

            <div class="form-group">               
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" name="numero" id="numero"  value="{{$endereco->numero}}">        
            </div> 

            <div class="form-group">               
                <label for="complemento">COMPLEMENTO</label>
                <input type="text" class="form-control" name="complemento" id="complemento"  value="{{$endereco->complemento}}">        
            </div> 

            <div class="form-group">               
                <label for="ponto_referencia">PONTO DE REFERÊNCIA</label>
                <input type="text" class="form-control" name="ponto_referencia" id="ponto_referencia"  value="{{$endereco->ponto_referencia}}">        
            </div> 

            <div class="form-group">               
                <label for="bairro">BAIRRO</label>
                <input type="text" class="form-control" name="bairro" id="bairro"  value="{{$endereco->bairro}}">        
            </div> 

            <div class="form-group">
                <label for="">CIDADE</label>
                <select name="cidade_id" id="cidade_id" class="form-control">
                    @foreach($cidades as $cidade)
                    <option value="{{$cidade->id}}"> {{$cidade->nome}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-info" style="color:white">Salvar</button>  
            <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar?')" href="{{ route('listar_endereco') }}">Cancelar</a> 
      
    </div>
@endsection
