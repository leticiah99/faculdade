@extends('layouts.dashboard') 
@section('content-title', 'ORDENS DE SERVIÇO')


@section('content')

 
<div class="container-xl">
    @csrf
             
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <form action="{{ route('pesquisar_ordem') }}" method="post" class="form form-inline">
                @csrf
                    <input type="text" name="filter" placeholder="Data ordem de serviço" class="form-control">
                    <button type="submit" class="btn btn-primary" style="background-color:grey">Pesquisar</button>
                </form>
            </div>
        </div>

    <div class="col-md-2">
            <div class="form-group">
    <a href="{{ route('salvar_ordem') }}" class="btn btn-success">Nova Ordem</a> <br></br>

    </div>
    </div>

    </div>
    
        @if(!count($ordens))
            <div class="alert alert-info">Nenhuma ordem de serviço cadastrada</div>
        @endif


        @if(count($ordens))
    
    <table class="table "> 
        <thead>
            <th scope="col">Nº ORDEM</th>
            <th scope="col">DATA</th>
            <th scope="col">HORA</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">STATUS</th>
            <th scope="col">CLIENTE</th>
            <th scope="col">PREÇO</th>

            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
           
        </thead>  

       <tbody>  

            @foreach($ordens as $ordem)
                <tr>
                <td>{{$ordem->id}}</td>
                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}</td>
                <td>{{$ordem->hora}}</td>
                <td>{{$ordem->descricao}}</td>
                <td>{{$ordem->status}}</td>
                <td>{{$ordem->cliente->nome}}</td>

                @php  
                    $total = $ordem->produtos()->sum('valor_unit_venda') + $ordem->servicos()->sum('preco');
                @endphp

                <td>R$ {{$total}},00</td>
                
                    <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-modal-lg">Visualizar</button>

                    <div class="modal fade bd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalOrdem" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header bg-dark text-white ">
                            <h5 class="modal-title" id="modalOrdem">Detalhes da ordem de serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="container-xl"> 
    
                        <br>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for=""> Nº ORDEM DE SERVIÇO</label>
                                    <input class="form-control" type="text" value="{{$ordem->id}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for=""> CLIENTE</label>
                                    <input class="form-control" type="text" value="{{$ordem->cliente->nome}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for=""> ENDEREÇO</label>
                                    <input class="form-control" type="text" value="{{$ordem->cliente->endereco->logradouro}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for=""> NÚMERO</label>
                                    <input class="form-control" type="text" value="{{$ordem->cliente->endereco->numero}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> BAIRRO</label>
                                    <input class="form-control" type="text" value="{{$ordem->cliente->endereco->bairro}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> CIDADE</label>
                                    <input class="form-control" type="text" value="{{$ordem->cliente->endereco->cidade->nome}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> DATA</label>
                                    <input class="form-control" type="text" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> HORA</label>
                                    <input class="form-control" type="text" value="{{ $ordem->hora}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> DESCRIÇÃO</label>
                                    <input class="form-control" type="text" value="{{$ordem->descricao}}" disabled>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> STATUS</label>
                                    <input class="form-control" type="text" value="{{$ordem->status}}" disabled>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> PREÇO</label>
                                    @php  
                                        $total = $ordem->produtos()->sum('valor_unit_venda') + $ordem->servicos()->sum('preco');
                                    @endphp
                                    <input class="form-control" type="text" value="R$ {{$total}}" disabled >
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>

                        </div>
                    </div>
                </div>
                
                    <td><a class="btn btn-primary" href="{{ route('editar_ordem', ['id'=>$ordem->id])}}"
                        title="Editar produto {{ $ordem->data_inicial }}" >Editar</a></td>       

                    <td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_ordem', $ordem->id)}}">Excluir</a>

            @endforeach

        </tbody>
    </table> 

    
    @endif


    
@endsection


