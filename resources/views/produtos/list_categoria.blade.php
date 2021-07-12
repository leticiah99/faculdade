@extends('layouts.dashboard') 
@section('content-title', 'CATEGORIAS DE PRODUTO')


@section('content')

<div class="container-xl">
    
    <div class="row">
    
       <div class="col-md-12">
            <form action="{{ route('salvar_categoria') }}" method="post"> 
            @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="nome" id="nome" placeholder="Inserir nova categoria" />
                <div class="input-group-btn">
                    <button class="btn btn-success" type="submit">Cadastrar</button> <br /><br />
                </div>
                </div>
            </form>
        </div>   
    </div> 

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div> 

    <table class="table ">
        <thead >
            
            <th scope="col">CATEGORIA</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

       <tbody> 

            @foreach($categorias as $categoria)
                <tr>
                <td>{{$categoria->nome}}</td>

                    <td style="width: 10.00%"><a class="btn btn-primary" href="{{ route('editar_categoria', ['id'=>$categoria->id])}}"
                                title="Editar categoria {{ $categoria->nome }}" >Editar</a></td> 


                    <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_categoria', $categoria->id)}}">Excluir</a> 

            @endforeach

        </tbody>
    </table> 
    
@endsection
