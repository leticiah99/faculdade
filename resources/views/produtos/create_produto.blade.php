<!DOCTYPE HTML>
<html lang="pt-br">  
    <head>  
        <meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>
</html>

@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR PRODUTO')


@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session ('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session ('error')}}
    </div>
@endif

    <div class="container">
        <form action="{{ route('salvar_produto') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria_produto_id">CATEGORIA DE PRODUTO</label>
                    <select name="categoria_produto_id" id="categoria_produto_id"  class="form-select @error('categoria_produto_id') is-invalid @enderror" name="categoria_produto_id" value="{{ old('categoria_produto_id') }}" required autocomplete="categoria_produto_id">
                        <option value="">Selecione a categoria</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}" > {{$categoria->nome}}</option>
                        @endforeach
                    </select> 
                    @error('categoria_produto_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
                </div> 
            </div>

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
                    <label for="marca">MARCA</label>
                    <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ old('marca') }}" required autocomplete="marca" >
                    @error('marca')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
            </div>
            

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="modelo">MODELO</label>
                    <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{ old('modelo') }}" required autocomplete="modelo" >
                    @error('modelo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div> 
            </div>

                            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="voltagem">VOLTAGEM</label>
                    <select name="voltagem" id="role"  class="form-select @error('voltagem') is-invalid @enderror" name="voltagem" value="{{ old('voltagem') }}" required autocomplete="voltagem">
                        <option value="">Selecione a voltagem</option>
                        <option value="110v">110v</option>
                        <option value="220v">220v</option>
                        <option value="Bivolt">Bivolt</option>
                        <option value="Sem voltagem">Sem voltagem</option>
                    </select>
                    @error('voltagem')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>
            </div>
                
            <div class="col-md-2">
                <div class="form-group">               
                    <label for="quantidade">QUANTIDADE</label>
                    <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade" >
                    @error('quantidade')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div> 
            </div>
                
                
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="valor_unit_custo">PREÇO UNITÁRIO DE CUSTO</label>
                    <input id="valor_unit_custo" type="text" class="form-control @error('valor_unit_custo') is-invalid @enderror" name="valor_unit_custo" value="{{ old('valor_unit_custo') }}" required autocomplete="valor_unit_custo" >
                    @error('valor_unit_custo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div> 
            </div>

            <div class="col-md-5">
                <div class="form-group">               
                    <label for="valor_unit_venda">PREÇO UNITÁRIO DE VENDA</label>
                    <input id="valor_unit_venda" type="text" class="form-control @error('valor_unit_venda') is-invalid @enderror" name="valor_unit_venda" value="{{ old('valor_unit_venda') }}" required autocomplete="valor_unit_venda" >
                    @error('valor_unit_venda')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div> 
            </div>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button> 
       
    </div>


@endsection
