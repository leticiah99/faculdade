 
@extends('layouts.dashboard')
@section('content-title', 'CADASTRAR ORDEM DE SERVIÇO')

 
 @section('content')
     <div class="container">
         <form action="{{ route('salvar_ordem') }}" method="post"> 
         @csrf
         <div class="row">
            <div class="col-md-8">
                <div class="form-group">               
                    <select name="cliente_id" id="cliente_id"  class="form-select @error('cliente_id') is-invalid @enderror" name="cliente_id" value="{{ old('cliente_id') }}" required autocomplete="cliente_id" style="width: 120.00%">
                        <option>Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id}}"> {{ $cliente->nome}}</option>
                            @endforeach
                    </select> 
                    @error('cliente_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                </div> 
            </div>
        
                <div class="col-md-3">
                    <div class="input-group-btn" style="position: absolute; right: 0;">
                        @csrf          
                        <a href="{{ route('salvar_cliente') }}"  class="btn btn-outline-success">Novo cliente</a> 
                    </div>
                </div>
            </div>

             <div class= "row">
                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="data_inicial">DATA</label>
                        <input id="data_inicial" type="date" class="form-control @error('data_inicial') is-invalid @enderror" name="data_inicial" min="<?= date('Y-m-d'); ?>" value="{{ old('data_inicial') }}" required autocomplete="data_inicial" >
                        @error('data_inicial')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>  
                </div>

                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="hora">HORA</label>
                        <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{ old('hora') }}" required autocomplete="hora">
                        @error('hora')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div> 
                </div>
             </div>
  
             <div class="form-group">               
                 <label for="descricao">DESCRICAO</label>
                 <textarea id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao"></textarea>  
                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror                 
             </div> 
  
  
             <div class="form-group"  hidden>
                 <label for="status">STATUS</label>
                 <input type="text" class="form-control" name="status" id="status" value="Aguardando">                  
             </div>

             <div class="form-group"  hidden>
                 <label for="valor_pago">PREÇO</label>
                 <input type="text" class="form-control" name="valor_pago" id="valor_pago" value="{{0}}">                  

             </div>

             <div class="form-group" hidden>
                 <label for="user_id">USUÁRIO</label>
                 <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}">                  

             </div>
              
             <button type="submit" class="btn btn-success">Cadastrar</button>        
     </div>
 @endsection
 

