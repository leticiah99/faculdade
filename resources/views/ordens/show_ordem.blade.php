
@extends('layouts.dashboard') 
@section('content-title', 'DETALHES DA ORDEM DE SERVIÇO')


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

    <div class="container-xl"> 
        
    <br>
    <div class="alert alert-info">
             É possível adicionar produtos na aba de produtos e adicionar serviços na aba de serviços!
        </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for=""> Nº ORDEM DE SERVIÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->id}}">
            </div>
        </div>

        <div class="col-md-9">
            <div class="form-group">
                <label for=""> CLIENTE</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->nome}}">
            </div>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <label for=""> ENDEREÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->logradouro}}">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for=""> NÚMERO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->numero}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> BAIRRO</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->bairro}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> CIDADE</label>
                <input class="form-control" type="text" value="{{$ordemServico->cliente->endereco->cidade->nome}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> DATA INICIAL</label>
                <input class="form-control" type="text" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordemServico->data_inicial))->format('d/m/Y')}}" >
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> HORA</label>
                <input class="form-control" type="time" value="{{($ordemServico->hora)}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> DESCRIÇÃO</label>
                <input class="form-control" type="text" value="{{$ordemServico->descricao}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> STATUS</label>
                <input class="form-control" type="text" value="{{$ordemServico->status}}">
            </div>
        </div>

        <div class="col-md-12" hidden>
            <div class="form-group">
                <label for=""> PREÇO</label>
                <input class="form-control" type="text" value="{{$ordemServico->produtos()->sum('valor_unit_venda')}}" >
        </div>
    </div>
</div>

        <td><a class="btn btn-primary" href="{{ route('editar_ordem', ['id'=>$ordemServico->id])}}" >Editar</a></td>  

        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-modal-lg">Finalizar</button>
<br>
        <div class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalOrdem" aria-hidden="true">
        <form action="{{ route('finalizar_ordem', ['id' => $ordemServico->id]) }}" method="post">
          
@csrf
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header bg-dark text-white ">
                            <h5 class="modal-title" id="modalOrdem">Finalizar ordem de serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="container-xl"> 
    
                        <br>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Nº ORDEM DE SERVIÇO</label>
                                    <input class="form-control" type="text" value="{{$ordemServico->id}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for=""> CLIENTE</label>
                                    <input class="form-control" type="text" value="{{$ordemServico->cliente->nome}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> DATA INICIAL</label>
                                    <input class="form-control" type="text" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordemServico->data_inicial))->format('d/m/Y')}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> DATA FINAL</label>
                                    <input class="form-control" name="data_final" type="date" value="{{$ordemServico->data_final}}">
                                </div>
                            </div>

<!--
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">STATUS</label>
                                    <select name="status" id="status" class="form-select">             
                                        <option value="{{$ordemServico->status}}" selected>{{$ordemServico->status}}</option>
                                        <option value="1">Aguardando</option>
                                        <option value="2">Em andamento</option>
                                        <option value="3">Finalizado</option>
                                        <option value="4">Cancelado</option>
                                    </select>
                                </div> 
                            </div> -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">FORMA DE PAGAMENTO</label>
                                    <select name="forma_pagamento" id="forma_pagamento" class="form-select">             
                                        <option value="Selecione">Selecione a forma de pagamento</option>
                                        <option value="1">Crédito</option>
                                        <option value="2">Débito</option>
                                        <option value="3">Em espécie</option>
                                    </select>
                                </div>
                            </div> 


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> PREÇO TOTAL</label>
                                    @php  
                                        $total = $ordemServico->produtos()->sum('valor_unit_venda') + $ordemServico->servicos()->sum('preco');
                                    @endphp
                                    <input class="form-control" name="valor_pago" type="text" value="{{$total}}" >
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
