@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR CLIENTE')

@section('content')

<div class="container">
    <form action="{{ route('salvar_cliente') }}" method="post"> 
    @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="nome">NOME</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror               
                </div> 
            </div>
 
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="telefone">TELEFONE</label>
                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" >
                    @error('telefone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div> 
 
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="logradouro">LOGRADOURO</label>
                    <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" value="{{ old('logradouro') }}" required autocomplete="logradouro" >
                    @error('logradouro')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>  
            </div>
            
            <div class="col-md-3">
                <div class="form-group">               
                    <label for="numero">NÚMERO</label>
                    <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" >
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div>

            <div class="col-md-3">
                <div class="form-group">               
                    <label for="complemento">COMPLEMENTO</label>
                    <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ old('complemento') }}" required autocomplete="complemento" >
                    @error('complemento')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                      
                </div> 
            </div>

            <div class="col-md-12">
                <div class="form-group">               
                    <label for="ponto_referencia">PONTO DE REFERÊNCIA</label>
                    <input id="ponto_referencia" type="text" class="form-control @error('ponto_referencia') is-invalid @enderror" name="ponto_referencia" value="{{ old('ponto_referencia') }}" required autocomplete="ponto_referencia" >
                    @error('ponto_referencia')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="bairro">BAIRRO</label>
                    <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro" >
                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade_id">CIDADE</label>
                    <select name="cidade_id" id="cidade_id"  class="form-select @error('cidade_id') is-invalid @enderror" name="cidade_id" value="{{ old('cidade_id') }}" required autocomplete="cidade_id">
                        <option value="">Selecione a cidade</option>
                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}" > {{$cidade->nome}}</option>
                        @endforeach
                    </select> 
                    @error('cidade_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div> 
            </div>
         </div>
        <br>
        <button type="submit" class="btn btn-success mr-2">Cadastrar</button>
        <a href="{{route ('listar_cliente')}}" class="btn btn-danger"> Cancelar</a>
     
</div>
@endsection

@section('scriptjs')
    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9 9999-9999');
        });
    </script>
@endsection