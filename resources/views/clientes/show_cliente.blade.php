@extends('layouts.dashboard') 
@section('content-title', 'DADOS DO CLIENTE')


@section('content')


    <div class="container-xl">
        @csrf

      <!--  <a href="{{route('relatorio_cliente',  ['id' => $cliente->id])}}" target="_blank" > Gerar relatório do cliente </a> -->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for=""> NOME</label>
                <input class="form-control" type="text" value="{{$cliente->nome}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> TELEFONE</label>
                <input class="form-control" type="text" value="{{$cliente->telefone}}" disabled>
            </div>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                <label for=""> LOGRADOURO</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->logradouro}}" disabled>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for=""> NÚMERO</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->numero}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> COMPLEMENTO</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->complemento}}" disabled>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for=""> PONTO DE REFERÊNCIA</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->ponto_referencia}}" disabled>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for=""> BAIRRO</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->bairro}}" disabled>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for=""> CIDADE</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->cidade->nome}}" disabled>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for=""> ESTADO</label>
                <input class="form-control" type="text" value="{{$cliente->endereco->cidade->estado->uf}}" disabled>
            </div>
        </div>

    </div>

        

         
            <br>
            @if(!count($cliente->ordens))
            <div class="alert alert-info">Nenhuma ordem de serviço cadastrada</div>
            @endif


        @if(count($cliente->ordens))

            <h4 id="center"><b>ORDENS DE SERVIÇO</b> </h4>
            <table class="table">
             <thead>
            
            <th scope="col">DATA </th>
            <th scope="col">HORA </th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">STATUS</th>
            <th scope="col"></th>
           
        </thead>  

       <tbody> 

            @foreach($cliente->ordens as $ordem)
                <tr>

                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}</td>
                <td>{{$ordem->hora}}</td>
                <td>{{$ordem->descricao}}</td>
                <td>{{$ordem->status}}</td>   

                <td><a class="btn btn-dark text-light "  href="{{route('detalhar_ordem', $ordem->id)}}">Visualizar</a>


            @endforeach
            </tbody>

    </table>     
    @endif 
    <td><a class="btn btn-primary" href="{{ route('editar_cliente', ['id'=>$cliente->id])}}"
                                title="Editar cliente {{ $cliente->nome }}" >Editar</a></td>    
        
    </div>

@endsection