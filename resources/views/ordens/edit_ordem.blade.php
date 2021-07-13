@extends('layouts.dashboard') 
@section('content-title', 'EDITAR ORDEM DE SERVIÇO')

@section('content')

    <ul class="nav nav-tabs">
        <li class="nav-item">
           <a class="nav-link active" >Detalhes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adicionar_produto', ['id'=>$ordemServico->id])}}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adicionar_servico', ['id'=>$ordemServico->id])}}">Serviços</a>
        </li>
    </ul>
    <br>

    <div class="container">
        <form action="{{ route('atualizar_ordem', ['id' => $ordemServico->id]) }}" method="post">
         
        @csrf
        <div class="alert alert-info">
             É possível adicionar produtos na aba de produtos e adicionar serviços na aba de serviços!
        </div>
            <div class="form-group" hidden>               
                <label for="cliente_id">CLIENTE</label>
                <input type="text" class="form-control" name="cliente_id" id="cliente_id"  value="{{$ordemServico->cliente_id}}">        
            </div>  
 
            <div class= "row">
                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="data_inicial">DATA</label>
                        <input id="data_inicial" type="date" class="form-control @error('data_inicial') is-invalid @enderror" name="data_inicial" min="<?= date('Y-m-d'); ?>" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordemServico->data_inicial))->format('Y-m-d')}}" required autocomplete="data_inicial" >
                        @error('data_inicial')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror        
                    </div>  
                </div>

              
                <div class="col-md-6">
                    <div class="form-group">               
                        <label for="data_inicial">HORA</label>
                        <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{$ordemServico->hora}}" required autocomplete="hora">
                        @error('hora')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror      
                    </div>
                </div>
            </div>

 
            <div class="form-group">               
                <label for="descricao">DESCRIÇÃO</label>
                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{$ordemServico->descricao}}" required autocomplete="descricao">  
                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror           
            </div>  
        
            <div class="form-group">
                <label for="">ALTERAR STATUS</label>
                <select name="status" id="status" class="form-select">             
                    <option value="{{$ordemServico->status}}" selected>{{$ordemServico->status}}</option>
                    <option value="1">Aguardando</option>
                    <option value="2">Em andamento</option>
                    <option value="3">Finalizado</option>
                    <option value="4">Cancelado</option>
                </select>
            </div> 

            <div class="form-group hidden" hidden>
                <label for="">FORMA DE PAGAMENTO</label>
                <select name="forma_pagamento" id="forma_pagamento" class="form-control">             
                    <option value="{{$ordemServico->forma_pagamento}}" selected>{{$ordemServico->forma_pagamento}}</option>
                    <option value="1">Crédito</option>
                    <option value="2">Débito</option>
                    <option value="3">Em espécie</option>
                </select>
            </div> 


            <div class="form-group hidden" hidden>               
                <label for="valor_pago">PREÇO FINAL</label>
                <input type="text" class="form-control" name="valor_pago" id="valor_pago" value="{{$ordemServico->valor_pago}}">                  
            </div> 
            <button type="submit" class="btn btn-info" style="color:white">Salvar</button> 
            <a href="{{route ('listar_ordem')}}" class="btn btn-danger"> Cancelar</a>
     
    </div>
@endsection 
