@extends('layouts.dashboard') 
@section('content-title', 'ORDENS DE SERVIÇO')

@section('content')

<div class="container-xl">
       
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <form action="{{ route('pesquisar_ordem') }}" method="post" class="form-inline">
                @csrf
                           
                <div class="form-group row"> 
                    <label for="data_inicial" class="col-md-5 col-form-label text-md-right ">{{ __('Selecione a data:') }}</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control mr-4" name="data_inicial" id="data_inicial" >
                    </div> 
                </div>

                 <div class="col-md-6">
                    <select class="form-select" name="status" >
                        <option>Status da ordem de serviço</option>
                        <option>Aguardando</option>
                        <option>Em andamento</option>
                        <option>Finalizado</option>
                        <option>Cancelado</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-dark" >Pesquisar</button>
                
                </form>
            </div>
        </div>


            <div class="col-md-2">
                    <div class="form-group">
            <a href="{{ route('salvar_ordem') }}"  class="btn btn-success" >Cadastrar</a> <br></br>
            </div>
    </div>

    </div>
    
        @if(!count($ordens))
            <div class="alert alert-info">Nenhuma ordem de serviço encontrada.</div>
        @endif


        @if(count($ordens))

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> 
    
    <table class="table "> 
        <thead>
            <th scope="col">Nº OS</th>
            <th scope="col">DATA</th>
            <th scope="col">HORA</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">STATUS</th>
            <th scope="col">CLIENTE</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
           
        </thead>  

       <tbody>   

            @foreach($ordens as $ordem)
                <tr>
                <td style="width: 7.00%">{{$ordem->id}}</td>
                <td style="width: 8.00%">{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}</td>
                <td style="width: 10.00%">{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->hora))->format('H:i')}}</td>
                <td style="width: 15.00%">{{$ordem->descricao}}</td>
                <td>{{$ordem->status}}</td>
                <td>{{$ordem->cliente->nome}}</td>             
                <td style="width: 10.00%"><button type="button" class="btn btn-secondary" style="background-color:grey" data-toggle="modal" data-target="#modalOs{{$ordem->id}}">Visualizar</button>
                @if($ordem->status == 'Aguardando' || $ordem->status == 'Em andamento')
                <td style="width: 8.00%"><a class="btn btn-primary" href="{{ route('editar_ordem', ['id'=>$ordem->id])}}"
                        title="Editar produto {{ $ordem->data_inicial }}" >Editar</a></td>  
                @endif    
                @if($ordem->status == 'Finalizado' || $ordem->status == 'Cancelado')
                <td style="width: 8.00%"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Editar
                </button></td>
                @endif    
                <td style="width: 10.00%"><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')" href="{{route('excluir_ordem', $ordem->id)}}">Excluir</a>
 

                    <!-- Modal OS Finalizada -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-dark text-white ">
                            <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Esta ordem de serviço já foi finalizada!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            
                        </div>
                        </div>
                    </div>
                    </div>


                    <!-- Modal Visualizar Ordem -->                
                    <div class="modal fade bd-modal-lg" id="modalOs{{$ordem->id}}" tabindex="-1" role="dialog" aria-labelledby="modalOrdem" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white ">
                                    <h5 class="modal-title">Detalhes da ordem de serviço</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <div class="container-xl"> <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Nº ORDEM DE SERVIÇO</label>
                                            <input class="form-control" type="text" value="{{$ordem->id}}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">USUÁRIO</label>
                                            <input class="form-control" type="text" value="{{Auth::user()->name}}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
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
                                            <input class="form-control" type="text" value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->hora))->format('H:i')}}" disabled>
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
                                </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>

                            </div>
                        </div>
                    </div>   
              
            @endforeach
           

        </tbody>
    </table> 
    {{ $ordens->links() }}
    
    
    @endif

@endsection

<!--
@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script>
        
    </script>

@endsection
-->