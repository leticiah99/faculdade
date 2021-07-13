@extends('layouts.dashboard') 
@section('content-title', 'EDITAR PRODUTO')

@section('scriptjs')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mask.js') }}"></script>
<link href="https://code.jquery.com/jquery-3.3.1.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       $('#valor_unit_custo').mask('000.000.000.000.000.00', {reverse: true});
       $('#valor_unit_venda').mask('000.000.000.000.000.00', {reverse: true});
    </script>
@endsection

@section('content')
    
    <div class="container">
        
    <form action="{{ route('atualizar_produto', ['id' => $produto->id]) }}" method="post">  
      
    @csrf 
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">CATEGORIA DE PRODUTO</label>
                <select name="categoria_produto_id" id="categoria_produto_id"  class="form-select @error('categoria_produto_id') is-invalid @enderror" name="categoria_produto_id" value="{{ old('categoria_produto_id') }}" required autocomplete="categoria_produto_id">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{$categoria->id == $produto->categoria_produto_id ? 'selected' : ''}} > {{$categoria->nome}}</option>
                    @endforeach
                </select>
                    @error('categoria_produto_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror    
            </div> 
        </div>

        <div class="col-md-4"> 
            <div class="form-group">               
                <label for="nome">NOME</label>
                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{$produto->nome}}" required autocomplete="nome" >
                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror           
            </div> 
        </div> 

        <div class="col-md-4">
            <div class="form-group">               
                <label for="marca">MARCA</label>
                <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{$produto->marca}}" required autocomplete="marca" >
                    @error('marca')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror      
            </div> 
        </div> 

        <div class="col-md-6">
            <div class="form-group">
                <label for="">VOLTAGEM</label>
                <select name="voltagem" id="role"  class="form-select @error('voltagem') is-invalid @enderror" name="voltagem" value="{{ old('voltagem') }}" required autocomplete="voltagem">
                    <option value="{{$produto->voltagem}}" selected>{{$produto->voltagem}}</option>
                    <option value="110v">110v</option>
                    <option value="220v">220v</option>
                    <option value="Bivolt">Bivolt</option>
                    <option value="Sem voltagem">Sem voltagem</option>
                </select>
                    @error('voltagem')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
            </div>   
        </div> 

        <div class="col-md-6">
            <div class="form-group">               
                <label for="role">MODELO</label>
                <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{$produto->modelo}}" required autocomplete="modelo" >
                    @error('modelo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror            
            </div> 
        </div>

        <div class="col-md-2">
            <div class="form-group">               
                <label for="role">QUANTIDADE</label>
                <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{$produto->quantidade}}" required autocomplete="quantidade" >
                    @error('quantidade')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
            </div> 
        </div>

        <div class="col-md-5">
            <div class="form-group">               
                <label for="role">VALOR DE CUSTO</label>
                <input id="valor_unit_custo" type="text" class="form-control @error('valor_unit_custo') is-invalid @enderror" name="valor_unit_custo" value="{{$produto->valor_unit_custo}}" required autocomplete="valor_unit_custo" >
                    @error('valor_unit_custo')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
            </div> 
        </div>

        <div class="col-md-5">
            <div class="form-group">               
                <label for="role">VALOR DE VENDA</label>
                <input id="valor_unit_venda" type="text" class="form-control @error('valor_unit_venda') is-invalid @enderror" name="valor_unit_venda" value="{{$produto->valor_unit_venda}}" required autocomplete="valor_unit_venda" >
                    @error('valor_unit_venda')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror                   
            </div> 
        </div>  
    </div>
    <br>
            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_produto')}}" class="btn btn-danger"> Cancelar</a>

            
    </div>

@endsection
