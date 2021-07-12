@extends('layouts.dashboard') 
@section('content-title', 'USUÁRIOS')


@section('content')

<div class="container-xl">

        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <form action="{{ route('pesquisar_user') }}" method="post" class="form form-inline">
                    @csrf
                        <input type="text" name="filter" placeholder="Nome do usuário" class="form-control" style="width: 87.00%">
                        <button type="submit" class="btn btn-dark" >Pesquisar</button>
                    </form>
                </div>
            </div>
       
            <div class="col-md-2">
                <div class="form-group">
                    @csrf
                    <a href="{{ route('salvar_user') }}"  class="btn btn-success">Cadastrar</a> <br></br>
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

        <table class="table">
            <thead>
                
                <th scope="col">NOME</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">CARGO</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody> 

                @foreach($users as $user)
                    <tr>
                    <td style="width: 20.00%">{{$user->name}}</td>
                    <td style="width: 20.00%">{{$user->phone}}</td>
                    <td style="width: 20.00%">{{$user->email}}</td>
                    <td style="width: 20.00%">{{$user->role}}</td>
                    <td style="width: 8.00%"><a class="btn btn-primary" href="{{ route('editar_user', ['id'=>$user->id])}}">Editar</a></td>       
                    <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_user', $user->id)}}">Excluir</a>
                    </tr>
                @endforeach
 
            </tbody>          
        </table> 
        {{ $users->links() }}
</div>
       

@endsection
