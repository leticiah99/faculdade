 
@extends('layouts.dashboard')
@section('content-title', 'CADASTRAR ORDEM DE SERVIÇO')

 
 @section('content')
     <div class="container">
         <form action="{{ route('salvar_ordem') }}" method="post"> 
         @csrf
         <div class="row">
            <div class="col-md-8">
                <div class="form-group">             
                    
                    <select name="cliente_id" class="form-select">
                        <option>Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id}}"> {{ $cliente->nome}}</option>
                            @endforeach
                    </select> 
                </div>
            </div>
        
                <div class="col-md-4">
                    <div class="input-group-btn">
                        @csrf          
                        <a href="{{ route('salvar_cliente') }}"  class="btn btn-outline-success">Novo cliente</a> 
                    </div>
                </div>
            </div>

            
             <div class= "row">
                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="data_inicial">DATA</label>
                        <input type="date" class="form-control" name="data_inicial" id="data_inicial"> 
                    </div>  
                </div>

                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="hora">HORA</label>
                        <input type="time" class="form-control" name="hora" id="hora"> 
                    </div> 
                </div>
             </div>
  
         
  
             <div class="form-group">               
                 <label for="descricao">DESCRICAO</label>
                 <textarea type="text" class="form-control" name="descricao" id="descricao"></textarea>                  
             </div> 
  
  
             <div class="form-group" hidden >
                 <label for="status">STATUS</label>
                 <select class="form-control" name="status" id="status">
                     <option value=""></option>
                     <option value="1">Aguardando</option>
                     <option value="2">Em andamento</option>
                     <option value="3">Finalizado</option>
                     <option value="4">Cancelado</option>
                 </select>
             </div>
  
             <div class="form-group" hidden>               
                 <label for="valor_total">PREÇO</label>
                 <input type="text" class="form-control" name="valor_total" id="valor_total">                  
             </div>
  
             <div class="form-group" hidden>
                 <label for="forma_pagamento">FORMA DE PAGAMENTO</label>
                 <select class="form-control" name="forma_pagamento" id="forma_pagamento">
                     <option value=""></option>
                     <option value="1">Crédito</option>
                     <option value="2">Débito</option>
                     <option value="3">Em espécie</option>
                 </select>
             </div>
              
             <button type="submit" class="btn btn-success">Cadastrar</button>        
     </div>
 @endsection
 

