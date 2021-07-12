@extends('layouts.dashboard') 

@section('content-title', 'RELATÓRIOS DE ORDENS DE SERVIÇO')

@section('content')

<?php
$hoje = date('Y-m-d');
?>

<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Relatório Geral') }}</div>
                        <div class="card-body">
                            <div class="col text-center"> 
                                <br> 
                                <a class="btn btn-outline-secondary" method="GET" href="{{route('relatorio_os')}}" target="_blank"> Gerar relatório</a> 
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>           
        </div>

    <br>



    <div class="container">

        <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Relatório Geral') }}</div>
                            <div class="card-body">

                            <div class= "row">
                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="dataInicial">DATA INICIAL</label>
                                        <input type="date" class="form-control" name="dataInicial"> 
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="dataFinal">DATA FINAL</label>
                                        <input type="date" class="form-control" name="dataFinal" > 
                                    </div> 
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">                              
                                        <label for="status">STATUS</label>
                                        <select name="status" class="form-select">             
                                            <option>Selecione o status</option>                    
                                            <option value="Aguardando">Aguardando</option>
                                            <option value="Em andamento">Em andamento</option>
                                            <option value="Finalizado">Finalizado</option>
                                            <option value="Cancelado">Cancelado</option>
                                        </select>
                                    </div>  
                                </div>

                            </div>

                                <div class="col text-center"> <br> 
                                    <a class="btn btn-outline-secondary" method="GET" href="{{route('relatorio_os')}}" target="_blank"> Gerar relatório</a> 
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>           
        </div>
    </div>
</div>

@endsection