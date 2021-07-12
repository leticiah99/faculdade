@extends('layouts.dashboard') 
@section('content-title', 'EDITAR CLIENTE')


@section('content')
    <div class="container">
        <form action="{{ route('atualizar_cliente', ['id' => $cliente->id]) }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="nome">NOME</label>
                    <input type="text" class="form-control" name="nome" id="nome"  value="{{$cliente->nome}}">        
                </div>  
            </div>

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="telefone">TELEFONE</label>
                    <input type="text" class="form-control" name="telefone" id="telefone"  value="{{$cliente->telefone}}">        
                </div>  
            </div>

           

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="logradouro">LOGRADOURO</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro"  value="{{$cliente->endereco->logradouro}}">        
                </div>  
            </div>

            <div class="col-md-3">
                <div class="form-group">               
                    <label for="numero">NÚMERO</label>
                    <input type="text" class="form-control" name="numero" id="numero"  value="{{$cliente->endereco->numero}}">        
                </div> 
            </div>

            <div class="col-md-3">
                <div class="form-group">               
                    <label for="complemento">COMPLEMENTO</label>
                    <input type="text" class="form-control" name="complemento" id="complemento"  value="{{$cliente->endereco->complemento}}">        
                </div> 
            </div>

            <div class="col-md-12">
                <div class="form-group">               
                    <label for="ponto_referencia">PONTO DE REFERÊNCIA</label>
                    <input type="text" class="form-control" name="ponto_referencia" id="ponto_referencia"  value="{{$cliente->endereco->ponto_referencia}}">        
                </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="bairro">BAIRRO</label>
                    <input type="text" class="form-control" name="bairro" id="bairro"  value="{{$cliente->endereco->bairro}}">        
                </div> 
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="">CIDADE</label>
                    <select name="cidade_id" id="cidade_id" class="form-control">
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}" {{$cidade->id == $cliente->endereco->cidade_id ? 'selected' : ''}} > {{$cidade->nome}}</option>
                        @endforeach
                    </select>
                </div> 
            </div>

                <div class="col-md-6">
                    <div class="form-group" hidden>               
                        <input type="text" class="form-control" name="endereco_id" id="endereco_id"  value="{{$cliente->endereco_id}}">        
                    </div> 
                </div>
        </div>
        <br>
        
            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_cliente')}}" class="btn btn-danger"> Cancelar</a>

    </div>
@endsection
 