@extends('layouts.dashboard') 
@section('content-title', 'PRODUTOS')

@section('content')

<div class="container-xl">
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <form action="{{ route('pesquisar_produto') }}" method="post" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="Nome do produto" class="form-control" style="width: 87.00%">
                    <button type="submit" class="btn btn-dark" >Pesquisar</button>
                </form>
            </div>
        </div>

        @if (Gate::allows('isAdmin'))
        <div class="col-md-2">
            <div class="form-group">
                @csrf          
                <a href="{{ route('salvar_produto') }}"  class="btn btn-success" >Cadastrar</a> <br></br>  
            </div>
        </div>
        @endif
    </div>

    
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div> 

    @if(!count($produtos))
        <div class="alert alert-info">Nenhum produto cadastrado</div>
    @endif

    @if(count($produtos))
    <table class="table ">
        <thead>
            <th scope="col">NOME</th>
            <th scope="col">MARCA</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">PREÇO DE VENDA</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>        
        </thead>  
        <tbody> 
            @forelse($produtos as $produto)
                <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->marca}}</td>
                <td>{{$produto->categoria->nome}}</td> 
                <td>{{$produto->quantidade}}</td>
                <td>R${{$produto->valor_unit_venda}}</td>        
                <td style="width: 10.00%"><a class="btn btn-secondary text-light " style="background-color:grey"  href="{{route('detalhar_produto', $produto->id)}}">Visualizar</a>
                @if (Gate::allows('isAdmin'))
                <td style="width: 8.00%"><a class="btn btn-primary" href="{{ route('editar_produto', ['id'=>$produto->id])}}">Editar</a></td> 
                <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_produto', $produto->id)}}">Excluir</a>
                @endif
            @empty
            <tr>
                <td>Não existem produtos cadastrados.</td>
            </tr>
            @endforelse

        </tbody>
    </table> 
    {{ $produtos->links() }}
    @endif
   
@endsection

