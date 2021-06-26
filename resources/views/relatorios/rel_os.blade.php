@extends('layouts.dashboard') 

@section('content-title', 'RELATÓRIOS DE ORDENS DE SERVIÇO')

@section('content')

<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Relatório Geral') }}</div>
                        <div class="card-body">
                            <div class="col text-center"> 
                                <br> 
                                <button type="button" class="btn btn-outline-secondary">Gerar relatório</button>   
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
                    <div class="card-header">{{ __('Relatório Específico') }}</div>
                        <div class="card-body">
                            <div class= "row">
                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="data_inicial">DATA INICIAL</label>
                                        <input type="date" class="form-control" name="data_inicial" id="data_inicial"> 
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">               
                                        <label for="data_inicial">DATA FINAL</label>
                                        <input type="date" class="form-control" name="data_final" id="data_final"> 
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label for="">STATUS</label>
                                    <select name="status" id="status" class="form-select">             
                                        <option>Selecione o status</option>                    
                                        <option value="1">Aguardando</option>
                                        <option value="2">Em andamento</option>
                                        <option value="3">Finalizado</option>
                                        <option value="4">Cancelado</option>
                                    </select>
                                </div> 
                                
          
                            </div> 
                            <br>

                            <div class="col text-center">  
                                <button type="button" class="btn btn-outline-secondary">Gerar relatório</button>                            </div>
                            </div>
                    </div>
                </div>
            </div>           
        </div>

        <br>
    </div>

    
    

 



@endsection