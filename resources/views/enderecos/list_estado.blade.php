@extends('layouts.dashboard') 
@section('content-title', 'ESTADOS')


@section('content')
 
<div class="container-xl">
        
    <div class="row">

        <div class="col-md-5">
                <div class="form-group">

                    <form action="{{ route('pesquisar_estado') }}" method="post" class="form form-inline">
                    @csrf
                    <input type="text" name="filter" placeholder="UF do estado" class="form-control" style="width: 87.00%">
                    <button type="submit" class="btn btn-primary" style="background-color:grey">Pesquisar</button>

                    </form>
            
                </div>
            </div>

        <div class="col-md-7">
            <div class="form-group">
                <form action="{{ route('salvar_estado') }}" method="post"> 
                @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="uf" id="uf" placeholder="Cadastrar novo estado" />
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">Cadastrar</button><br></br>
                    </div>
                    </div>
                </form>
            </div>
        </div>


        
    </div>

    <table class="table">
        <thead>
            
            <th scope="col">ESTADO</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

       <tbody> 

            @foreach($estados as $estado)
            <tr>
            <td>{{$estado->uf}}</td>
                <td><a class="btn btn-primary" href="{{ route('editar_estado', ['id'=>$estado->id])}}"
                                title="Editar estado {{ $estado->uf }}" >Editar</a></td>       

                <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_estado', $estado->id)}}">Excluir</a>
                           <!--title="Excluir estado {{ $estado->uf }}" >Excluir</a></td> -->

            @endforeach

        </tbody>
    </table> 

@endsection
