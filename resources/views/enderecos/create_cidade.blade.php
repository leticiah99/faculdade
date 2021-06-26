@extends('layouts.dashboard') 
@section('content-title', 'CADASTRAR CIDADE')


@section('content')
    <div class="container">
        <form action="{{ route('salvar_cidade') }}" method="post"> 
        @csrf

            <div class="form-group">
                <label for="estado_id">CIDADE</label>
                <select name="estado_id" id="estado_id" class="form-select">
                    <option value="">Selecione o estado</option>
                    @foreach($estados as $estado)
                    <option value="{{$estado->id}}" > {{$estado->uf}}</option>
                    @endforeach
                </select>
            </div> 

            <div class="form-group">               
                <label for="nome">CIDADE</label>
                <input type="text" class="form-control" name="nome" id="nome">                  
            </div>  
            <button type="submit" class="btn btn-success">Salvar</button>        
    </div>
@endsection  



