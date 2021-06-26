@extends('layouts.dashboard') 
@section('content-title', 'DETALHES DO PRODUTO')


@section('content')


    <div class="container-xl">
        @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for=""> NOME</label>
                <input class="form-control" type="text" value="{{$produto->nome}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> MARCA</label>
                <input class="form-control" type="text" value="{{$produto->marca}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> MODELO</label>
                <input class="form-control" type="text" value="{{$produto->modelo}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> VOLTAGEM</label>
                <input class="form-control" type="text" value="{{$produto->voltagem}}" disabled>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for=""> QUANTIDADE</label>
                <input class="form-control" type="text" value="{{$produto->quantidade}}" disabled>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for=""> PREÇO DE CUSTO</label>
                <input class="form-control" type="text" value="{{$produto->valor_unit_custo}}" disabled>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for=""> PREÇO DE VENDA</label>
                <input class="form-control" type="text" value="{{$produto->valor_unit_venda}}" disabled>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for=""> CATEGORIA</label>
                <input class="form-control" type="text" value="{{$produto->categoria->nome}}" disabled>
            </div>
        </div>

    </div>

    <td><a class="btn btn-primary" href="{{ route('editar_produto', ['id'=>$produto->id])}}"
                                title="Editar produto {{ $produto->nome }}" >Editar</a></td>    
        
    </div>

@endsection