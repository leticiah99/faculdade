@extends('layouts.dashboard')
@section('content-title', 'ADICIONAR SERVIÇOS')


@section('content')


    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('detalhar_ordem', ['id'=>$ordemServico->id])}}" >Detalhes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adicionar_produto', ['id'=>$ordemServico->id])}}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" >Serviços</a>
        </li>
    </ul>

<div class="container-xl">
<br></br>
<div class="col-md-12">
</div> 

<form action="{{route('adicionar_servico', [$ordemServico->id]) }}" method="post"> 
@csrf

            <div class="input-group col-md-12 ">
                <select name="servico" class="form-select">
                    <option>Selecione o serviço</option>
                    @foreach($servicos as $servico)
                        <option value="{{$servico->id}}">{{$servico->nome}}</option>
                    @endforeach
                </select>

                <div class="col-md-4">
                    <div class="input-group">
                        <input id="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" name="quantidade" value="{{ old('quantidade') }}" required autocomplete="quantidade" placeholder="Quantidade" >
                        @error('quantidade')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                    </div>
                </div>
            
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
            <br></br>

            <div class="col-md-12">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    @endforeach
                </div> 
            </div>


    <div class="col-md-12">
        <h4>Serviços adicionados</h4>

        @if(!count($ordemServico->servicos))
            <div class="alert alert-info">Nenhum serviço adicionado.</div>
        @endif


        @if(count($ordemServico->servicos))

        <table class="table ">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody> 
                @php  
                    $valor_total = 0;
                @endphp 
                @foreach($ordemServico->servicos as $servico)
                <tr>       

                    <td style="width: 20.00%">{{$servico->nome}} </td>
                    <td style="width: 20.00%">R$ {{$servico->preco}}</td>
                    <td style="width: 20.00%">{{$servico->pivot->quantidade}}</td>
                    <td style="width: 20.00%">R$ {{$servico->pivot->valor}}</td>
                    <td style="width: 10.00%"><a class="btn btn-danger"  href="{{route ('remover_servico', [$ordemServico->id, $servico->id])}}">Excluir</a>
                    </td>
                </tr>
                @php  
                    $valor_total += $servico->pivot->valor; 
                @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">Valor total de serviços: R$ {{$valor_total}}</td>
                </tr>
            </tfooter>

        </table>
        @endif
    </div>

   
    
</form>
</div>

@endsection