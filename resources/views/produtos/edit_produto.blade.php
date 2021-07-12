@extends('layouts.dashboard') 
@section('content-title', 'EDITAR PRODUTO')


@section('content')
    
    <div class="container">
        
    <form action="{{ route('atualizar_produto', ['id' => $produto->id]) }}" method="post">  
      
    @csrf 
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">CATEGORIA DE PRODUTO</label>
                <select name="categoria_produto_id" id="" class="form-select">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{$categoria->id == $produto->categoria_produto_id ? 'selected' : ''}} > {{$categoria->nome}}</option>
                    @endforeach
                </select>
            </div> 
        </div>

        <div class="col-md-4">
            <div class="form-group">               
                <label for="nome">NOME</label>
                <input type="text" class="form-control" name="nome" id="nome"  value="{{$produto->nome}}">        
            </div> 
        </div> 

        <div class="col-md-4">
            <div class="form-group">               
                <label for="marca">MARCA</label>
                <input type="text" class="form-control" name="marca" id="marca"  value="{{$produto->marca}}">        
            </div> 
        </div> 

        <div class="col-md-6">
            <div class="form-group">
                <label for="">VOLTAGEM</label>
                <select name="voltagem" id="voltagem" class="form-select">             
                    <option value="{{$produto->voltagem}}" selected>{{$produto->voltagem}}</option>
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                    <option value="Bivolt">Bivolt</option>
                    <option value="Sem voltagem">Sem voltagem</option>
                </select>
            </div>   
        </div> 

        <div class="col-md-6">
            <div class="form-group">               
                <label for="role">MODELO</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="{{$produto->modelo}}">                  
            </div> 
        </div>

        <div class="col-md-2">
            <div class="form-group">               
                <label for="role">QUANTIDADE</label>
                <input type="text" class="form-control" name="quantidade" id="quantidade" value="{{$produto->quantidade}}">                  
            </div> 
        </div>

        <div class="col-md-5">
            <div class="form-group">               
                <label for="role">VALOR DE CUSTO</label>
                <input type="text" class="form-control" name="valor_unit_custo" id="valor_unit_custo" value="{{$produto->valor_unit_custo}}">                  
            </div> 
        </div>

        <div class="col-md-5">
            <div class="form-group">               
                <label for="role">VALOR DE VENDA</label>
                <input type="text" class="form-control" name="valor_unit_venda" id="valor_unit_venda" value="{{$produto->valor_unit_venda}}">                  
            </div> 
        </div>  
    </div>
    <br>
            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_produto')}}" class="btn btn-danger"> Cancelar</a>

            
    </div>

@endsection
