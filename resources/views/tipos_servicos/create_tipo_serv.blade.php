@extends('layouts.dashboard')

@section('content-title', 'CADASTRAR TIPO DE SERVIÇO')

@section('scriptjs')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mask.js') }}"></script>
<link href="https://code.jquery.com/jquery-3.3.1.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       $('#preco').mask('000.000.000.000.000.00', {reverse: true});
    </script>
@endsection
@section('content')
<div class="container">
        <form action="{{ route('salvar_tipo_serv') }}" method="post"> 
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="nome">DESCRIÇÃO</label>
                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                    
                </div>
            </div>
           
            <div class="col-md-5">
                <div class="form-group">               
                    <label for="preco">PREÇO </label>
                    <input id="preco" type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ old('preco') }}" required autocomplete="preco" >
                    @error('preco')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                      
                </div>
            </div>

        </div>  

            <button type="submit" class="btn btn-primary">Cadastrar</button>        
</div>
@endsection
 