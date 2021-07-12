
@extends('layouts.dashboard') 
@section('content-title', 'DETALHES DA ORDEM DE SERVIÇO')


@section('content')


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
</div> 

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

    <div class="container-xl"> 
        
    <br>
    <div class="alert alert-info">
             É possível adicionar produtos na aba de produtos e adicionar serviços na aba de serviços!
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for=""> Nº ORDEM DE SERVIÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->id}}" disabled style="background-color:white" > 
            </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <label for=""> USUÁRIO RESPONSÁVEL</label>
                <input class="form-control" type="text" value="{{Auth::user()->name}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for=""> CLIENTE</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->nome}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <label for=""> ENDEREÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->logradouro}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for=""> NÚMERO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->numero}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> BAIRRO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->bairro}}" disabled style="background-color:white"> 
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> CIDADE</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->cidade->nome}}" disabled style="background-color:white" > 
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> DATA INICIAL</label>
                <input class="form-control" type="text" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordemServico->data_inicial))->format('d/m/Y')}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> HORA</label>
                <input class="form-control" type="time" value="{{($ordemServico->hora)}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> DESCRIÇÃO</label>
                <input class="form-control" type="text" value="{{$ordemServico->descricao}}" disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> STATUS</label>
                <input class="form-control" type="text" value="{{$ordemServico->status}}"disabled style="background-color:white" >
            </div>
        </div>

        <div class="col-md-12" hidden>
            <div class="form-group">
                <label for=""> PREÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->produtos()->sum('valor_unit_venda')}}" disabled style="background-color:white" >
        </div>
    </div>
</div>

        <td><a class="btn btn-primary" href="{{ route('editar_ordem', ['id'=>$ordemServico->id])}}" >Editar</a></td>  

        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-modal-lg">Finalizar</button>
<br>
        <div class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalOrdem" aria-hidden="true">
        <form action="{{ route('finalizar_ordem', ['id' => $ordemServico->id]) }}" method="post">
        @csrf

                        <!-- Modal Finalizar OS -->
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header bg-dark text-white ">
                            <h5 class="modal-title" id="modalOrdem">Finalizar ordem de serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>         
                        </div>
                        
                        <div class="container-xl"> <br>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Nº ORDEM DE SERVIÇO</label>
                                    <input class="form-control" type="text" value="{{$ordemServico->id}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> CLIENTE</label>
                                    <input class="form-control" type="text" value="{{$ordemServico->cliente->nome}}" disabled>
                                </div>
                            </div>

                                @php
                                $data_inicial = $ordemServico->data_inicial;
                                $data_final = date('Y-m-d', strtotime($data_inicial . ' +0 day'));
                                @endphp

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> DATA INICIAL</label>
                                    <input class="form-control" type="text" id="data_inicial" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordemServico->data_inicial))->format('d/m/Y')}}" disabled> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> DATA FINAL</label>
                                   <!-- <input class="form-control" name="data_final" type="date" value="{{$ordemServico->data_final}}"> -->
                                    <input id="data_final" type="date" class="form-control @error('data_final') is-invalid @enderror" name="data_final"  min="<?= $data_final ?>" value="{{ old('data_final') }}" required autocomplete="data_final" >
                                    @error('data_final')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 


                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">FORMA DE PAGAMENTO</label>
                                    <select name="forma_pagamento" id="forma_pagamento"  class="form-select @error('forma_pagamento') is-invalid @enderror" name="forma_pagamento" value="{{ old('forma_pagamento') }}" required autocomplete="forma_pagamento">            
                                        <option value="Selecione">Selecione a forma de pagamento</option>
                                        <option value="1">Crédito</option>
                                        <option value="2">Débito</option>
                                        <option value="3">Em espécie</option>
                                    </select>
                                    @error('forma_pagamento')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div> 


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> PREÇO TOTAL</label>
                                    @php
                                        $valorP=0;
                                        $valorS=0;
                                        $valor_total = 0;
                                   
                                            if(count($ordemServico->produtos)){  
                                                foreach($ordemServico->servicos as $servico){   
                                                    $valorS += $servico->pivot->valor;                    
                                                    
                                                } 
                                                foreach($ordemServico->produtos as $produto){  
                                                        $valorP += $produto->pivot->valor;  
                                                    }      
                                                $valor_total = $valorP + $valorS;
                                            }
                                            if(!count($ordemServico->produtos))
                                                $valor_total = $valorS;               
                                    @endphp        
                                    <input id="valor_pago" type="text" class="form-control @error('valor_pago') is-invalid @enderror" name="valor_pago"  value="{{$valor_total}}" required autocomplete="valor_pago" >
                                    @error('valor_pago')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 

                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Finalizar</button>   
                            <button type="button" class="btn btn-secondary" style="background-color:grey" data-dismiss="modal">Fechar</button>
                        </div>

                        </div>
                    </div>
                </div>
        
    </div>
    <br> <br>

    </div>


@endsection


