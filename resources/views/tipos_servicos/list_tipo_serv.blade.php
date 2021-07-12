@extends('layouts.dashboard') 
@section('content-title', 'SERVIÇOS')

@section('content')

<div class="container-xl">
        <form action="{{ route('salvar_tipo_serv') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" placeholder="Inserir novo tipo de serviço"/>
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div> 
            </div>

            <div class="col-md-5">
                <div class="input-group">
                    <input id="preco" type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ old('preco') }}" required autocomplete="preco" placeholder="Inserir preço"/>
                    @error('preco')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>
            </div>
                

                <div class="col-md-2">           
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">Cadastrar</button> <br /><br />
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
            
            <th scope="col">SERVIÇO</th>
            <th scope="col">PREÇO</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>

       <tbody> 

            @foreach($tipos_servicos as $tipos_servico)
            <tr>
            <td>{{$tipos_servico->nome}}</td>
            <td style="width: 60.00%">R$ {{$tipos_servico->preco}}</td>

                <td style="width: 10.00%"><a class="btn btn-primary" href="{{ route('editar_tipo_serv', ['id'=>$tipos_servico->id])}}"
                    title="Editar tipo de serviço {{ $tipos_servico->nome }}" >Editar</a></td>       

                <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_tipo_serv', $tipos_servico->id)}}">Excluir</a>
            
            @endforeach

        </tbody>
            <tr></tr>  
    </table> 
@endsection
