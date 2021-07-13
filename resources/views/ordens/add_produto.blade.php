@extends('layouts.dashboard')
@section('content-title', 'ADICIONAR PRODUTOS')


@section('content')


    <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('detalhar_ordem', ['id'=>$ordemServico->id])}}" >Detalhes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" >Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adicionar_servico', ['id'=>$ordemServico->id])}}" >Serviços</a>
            </li>
        </ul>

    <div class="container-xl">
        <br></br>

        <form action="{{route('adicionar_produto', [$ordemServico->id]) }}" method="post">
        @csrf

        <div class="row">

            <div class="input-group col-md-12">
                <select name="produto" class="form-select">
                    <option>Selecione o produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
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

                <button type="submit" class="btn btn-primary">Adicionar</button>

            </div>
        </div>


    <div class="col-md-12">
</br>
        <h4>Produtos adicionados</h4>

        @if(!count($ordemServico->produtos))
            <div class="alert alert-info">Nenhum produto adicionado.</div>
        @endif

        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        @if(count($ordemServico->produtos))

        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @php
                    $valor_total = 0;
                @endphp
                @foreach($ordemServico->produtos as $produto)

                <tr>
                    <td style="width: 20.00%">{{$produto->nome}} </td>
                    <td style="width: 20.00%">R$ {{$produto->valor_unit_venda}}</td>
                    <td style="width: 20.00%">{{$produto->pivot->quantidade}}</td>
                    <td style="width: 20.00%">R$ {{$produto->pivot->valor}}</td>
                    <td style="width: 10.00%"><a class="btn btn-danger"  href="{{route ('remover_produto', [$ordemServico->id, $produto->id, $produto->pivot->quantidade])}}">Excluir</a></td>

                </tr>
                    @php
                        $valor_total += $produto->pivot->valor;
                    @endphp
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5">Valor total de produtos: R$ {{$valor_total}}</td>
                </tr>
            </tfooter>
        </table>
        @endif
    </div>



    </form>
</div>

@endsection
