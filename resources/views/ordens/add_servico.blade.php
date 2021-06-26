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
            
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
            <br></br>


    <div class="col-md-12">
        <h4>Serviços adicionados</h4>

        @if(!count($ordemServico->servicos))
            <div class="alert alert-info">Nenhum serviço adicionado</div>
        @endif


        @if(count($ordemServico->servicos))

        <table class="table ">
            <thead>
                <tr>
                    <th>DESCRIÇÃO</th>
                    <th>PREÇO</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @php  
                    $total = 0;
                @endphp
                @foreach($ordemServico->servicos as $servico)
                <tr>
                    <td>{{$servico->nome}} </td>
                    <td style="width: 60.00%"> {{$servico->preco}} </td>
                    <td style="width: 10.00%"><a class="btn btn-danger"  href="{{route ('remover_servico', [$ordemServico->id, $servico->id])}}">Excluir</a>

                    </td>
                </tr>
                @php  
                    $total += $servico->preco;
                @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">Valor total de serviços: R$ {{$total}}</td>
                </tr>
            </tfooter>



        </table>
        @endif
    </div>

   
    
</form>
</div>

@endsection