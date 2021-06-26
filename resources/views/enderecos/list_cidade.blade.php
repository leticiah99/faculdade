@extends('layouts.dashboard') 
@section('content-title', 'CIDADES')


@section('content')

<div class="container-xl">
        @csrf

        <a href="{{ route('salvar_cidade') }}" class="btn btn-success">Cadastrar</a> <br></br>

        <form action="{{ route('pesquisar_cidade') }}" method="post" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Nome da cidade" class="form-control" style="width: 87.00%">
        <button type="submit" class="btn btn-primary" style="background-color:grey">Pesquisar</button>

        </form>
        
        <br></br>
            
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th scope="col">CÓDIGO</th>
            <th scope="col">CIDADE</th>
            <th scope="col">ESTADO</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
  
       <tbody> 

            @foreach($cidades as $cidade)
            <tr>
            <td>{{$cidade->id}}</td>
            <td>{{$cidade->nome}}</td>
            <td>{{$cidade->estado->uf}}</td>
            
                <td><a class="btn btn-primary" href="{{ route('editar_cidade', ['id'=>$cidade->id])}}"
                                title="Editar cidade {{ $cidade->nome }}" >Editar</a></td>       

                <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_cidade', $cidade->id)}}">Excluir</a>

            @endforeach

        </tbody>
    </table> 
    
@endsection
