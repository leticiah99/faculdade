@extends('layouts.dashboard')

@section('content-title', 'CADASTRAR TIPO DE SERVIÇO')
@section('content')
<div class="container">
        <form action="{{ route('salvar_tipo_serv') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="nome">DESCRIÇÃO</label>
                    <input type="text" class="form-control" name="nome" id="nome">                  
                </div>
            </div>
          
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="preco">PREÇO ESTIMADO</label>
                    <input type="text" class="form-control" name="preco" id="preco">                  
                </div>
            </div>

        </div>  

            <button type="submit" class="btn btn-primary">Cadastrar</button>        
</div>
@endsection
 