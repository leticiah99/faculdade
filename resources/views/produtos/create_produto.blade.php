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
    <div class="container">
        <form action="{{ route('salvar_produto') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categoria_produto_id">CATEGORIA DE PRODUTO</label>
                    <select name="categoria_produto_id" id="categoria_produto_id" class="form-select">
                        <option value="">Selecione a categoria</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}" > {{$categoria->nome}}</option>
                        @endforeach
                    </select> 
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="nome">NOME</label>
                    <input type="text" class="form-control" name="nome" id="nome">                  
                </div>
            </div>  
        
            <div class="col-md-6">
                <div class="form-group">               
                    <label for="marca">MARCA</label>
                    <input type="text" class="form-control" name="marca" id="marca">                  
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">               
                    <label for="modelo">MODELO</label>
                    <input type="text" class="form-control" name="modelo" id="modelo">                  
                </div> 
            </div>

                           
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="voltagem">VOLTAGEM</label>
                            <select class="form-select" name="voltagem" id="voltagem">
                                <option value="">Selecione a voltagem</option>
                                <option value="110">110v</option>
                                <option value="220">220v</option>
                                <option value="Bivolt">Bivolt</option>
                                <option value="Sem voltagem">Sem voltagem</option>
                            </select>
                        </div>
                    </div>
                
                        <div class="col-md-2">
                            <div class="form-group">               
                                <label for="quantidade">QUANTIDADE</label>
                                <input type="text" class="form-control" name="quantidade" id="quantidade">                  
                            </div> 
                        </div>
                

                
                    <div class="col-md-5">
                        <div class="form-group">               
                            <label for="valor_unit_custo">PREÇO UNITÁRIO DE CUSTO</label>
                            <input type="text" class="form-control" name="valor_unit_custo" id="valor_unit_custo">                  
                        </div> 
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">               
                            <label for="valor_unit_venda">PREÇO UNITÁRIO DE VENDA</label>
                            <input type="text" class="form-control" name="valor_unit_venda" id="valor_unit_venda">                  
                        </div> 
                    </div>
        </div>

            <button type="submit" class="btn btn-success">Cadastrar</button> 
       
    </div>


@endsection
