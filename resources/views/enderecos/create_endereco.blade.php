@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR ENDEREÇO')
@section('content')
    <div class="container">
        <form action="{{ route('salvar_endereco') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="logradouro">LOGRADOURO</label>
                <input type="text" class="form-control" name="logradouro" id="logradouro">                  
            </div>  

            <div class="form-group">               
                <label for="numero">NÚMERO</label>
                <input type="text" class="form-control" name="numero" id="numero">                  
            </div> 

            <div class="form-group">               
                <label for="complemento">COMPLEMENTO</label>
                <input type="text" class="form-control" name="complemento" id="complemento">                  
            </div> 

            <div class="form-group">               
                <label for="ponto_referencia">PONTO DE REFERÊNCIA</label>
                <input type="text" class="form-control" name="ponto_referencia" id="ponto_referencia">                  
            </div> 

            <div class="form-group">               
                <label for="bairro">BAIRRO</label>
                <input type="text" class="form-control" name="bairro" id="bairro">                  
            </div> 

            <div class="form-group">
                <label for="cidade_id">CIDADE</label>
                <select name="cidade_id" id="cidade_id" class="form-select">
                    <option value="">Selecione a cidade</option>
                    @foreach($cidades as $cidade)
                    <option value="{{$cidade->id}}" > {{$cidade->nome}}</option>
                    @endforeach
                </select>
            </div> 

            <button type="submit" class="btn btn-success">Cadastrar</button>        
    </div>
@endsection
