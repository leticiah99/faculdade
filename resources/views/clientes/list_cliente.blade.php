@extends('layouts.dashboard')
@section('content-title', 'CLIENTES')
@section('content')

<div class="container-xl">

    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <form action="{{ route('pesquisar_cliente') }}" method="post" class="form form-inline">
                @csrf
                    <input type="text" name="filter" placeholder="Nome do cliente" class="form-control" style="width: 87.00%">
                    <button type="submit" class="btn btn-dark">Pesquisar</button>
                </form> 
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <a href="{{ route('salvar_cliente') }}"  class="btn btn-success">Cadastrar</a> <br></br>
            </div>
        </div>
    </div>

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div> 
   
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">NOME</th>
                <th scope="col">TELEFONE</th>    
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td>                
                <td style="width: 10.00%"><a class="btn btn-secondary" style="background-color:grey"  href="{{route('detalhar_cliente', $cliente->id)}}">Visualizar</a>
                <td style="width: 8.00%"><a class="btn btn-primary" href="{{ route('editar_cliente', ['id'=>$cliente->id])}}">Editar</a></td> 
                <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_cliente', $cliente->id)}}">Excluir</a>
               
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
