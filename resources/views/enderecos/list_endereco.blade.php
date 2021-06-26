@extends('layouts.dashboard')
@section('content-title', 'ENDEREÇOS')


@section('content')

<div class="container-xl">
        <!-- <form action="{{ route('salvar_tipo_serv') }}" method="post"> -->
        @csrf
            
    <table class="table table-bordered">
        <thead class="thead-dark">
            
            <th scope="col">LOGRADOURO</th>
            <th scope="col">NÚMERO</th>
            <th scope="col">COMPLEMENTO</th>
            <th scope="col">BAIRRO</th>
            <th scope="col">PONTO DE REFERÊNCIA</th>
            <th scope="col">CIDADE</th>
          
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

       <tbody>  

            @foreach($enderecos as $endereco)
                <tr>
                <td>{{$endereco->logradouro}}</td>
                <td>{{$endereco->numero}}</td>
                <td>{{$endereco->complemento}}</td>
                <td>{{$endereco->bairro}}</td>
                <td>{{$endereco->ponto_referencia}}</td>
                <td>{{$endereco->cidade->nome}}</td>

                    <td><a class="btn btn-primary" href="{{ route('editar_endereco', ['id'=>$endereco->id])}}"
                                    title="Editar endereço {{ $endereco->logradouro }}" >Editar</a></td>       

                    <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_endereco', $endereco->id)}}">Excluir</a>               
            @endforeach

        </tbody>
            
    </table> 
    <tr>
        <td><a class="btn btn-success" href="{{ route('salvar_endereco', ['id'=>$endereco->id])}}"
               title="cadastrar endereço {{ $endereco->id }}" >Cadastrar</a></td>
    </tr> 

@endsection
