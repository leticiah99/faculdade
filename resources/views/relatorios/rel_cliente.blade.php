@extends('layouts.dashboard') 

@section('content-title', 'RELATÓRIOS DE CLIENTES')

@section('content')

<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Relatório Específico') }}</div>
                        <div class="card-body">
                            <div class="form-group">               
                                <label for="data_inicial">NOME DO CLIENTE</label>
                                <input type="text" class="form-control" name="nome" id="nome"> 
                            </div>  

                            <br>

                            <div class="col text-center">  
                                <button type="button" class="btn btn-outline-secondary">Gerar PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>



@endsection