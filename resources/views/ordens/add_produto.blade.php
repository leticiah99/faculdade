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
    <div class="col-md-12">
    </div>

    <form action="{{route('adicionar_produto', [$ordemServico->id]) }}" method="post"> 
    @csrf

            <div class="input-group col-md-12">
                <select name="produto" class="form-select">
                    <option>Selecione o produto</option>

                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>

              

                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" placeholder="Quantidade" class="form-control" name="quantidade" id="quantidade"> 
                    </div>
                </div>

                

                          
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>

             </div>
             
             <br></br>

             
    

    <div class="col-md-12">
        <h4>Produtos adicionados</h4>

        @if(!count($ordemServico->produtos))
            <div class="alert alert-info">Nenhum produto adicionado</div>
        @endif


        @if(count($ordemServico->produtos))

        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Preço</th>
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
                    <td style="width: 20.00%"> {{$produto->marca}} </td>
                    <td style="width: 20.00%"> {{$produto->categoria->nome}} </td>

                    <td style="width: 20.00%">{{$produto->valor_unit_venda}}</td>
                    <td style="width: 20.00%">{{$produto->quantidade}}</td>
                    <td style="width: 20.00%">{{$valor_total}}</td>
        
                    <td style="width: 10.00%"><a class="btn btn-danger"  href="{{route ('remover_produto', [$ordemServico->id, $produto->id])}}">Excluir</a></td>
                    
                </tr>
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