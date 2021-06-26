@extends('layouts.dashboard')
@section('content-title', 'CADASTRAR ESTADO')


@section('content')
    <div class="container">
        <form action="{{ route('salvar_estado') }}" method="post"> 
        @csrf

            <div class="form-group">               
                <label for="uf">UF</label>
                <input type="text" class="form-control" name="uf" id="uf">                  
            </div>  
            <button type="submit" class="btn btn-success">Cadastrar</button>        
    </div>
@endsection
