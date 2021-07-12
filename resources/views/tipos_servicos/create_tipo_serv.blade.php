@extends('layouts.dashboard')

@section('content-title', 'CADASTRAR TIPO DE SERVIÇO')
@section('content')
<div class="container">
        <form action="{{ route('salvar_tipo_serv') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="nome">DESCRIÇÃO</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
                </div>
            </div>
          
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="preco">PREÇO ESTIMADO</label>
                    <input id="preco" type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ old('preco') }}" required autocomplete="preco" >
                    @error('preco')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                      
                </div>
            </div>

        </div>  

            <button type="submit" class="btn btn-primary">Cadastrar</button>        
</div>
@endsection
 