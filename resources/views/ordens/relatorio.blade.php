<?php 

use App\Models\OrdemServico;
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));
$dataInicial = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinal = implode('/', array_reverse(explode('-', $dataFinal)));


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório</title>

    <style>

	@page {
		margin: 0px;
        
	}

	.footer {
		position:absolute;
		bottom:0;
		width:100%;
		background-color: #ebebeb;
		padding:10px;
	}

	.cabecalho {    
		background-color: #ebebeb;
		padding:10px;
		margin-bottom:30px;
	}

	.titulo{
        margin:0;
        font-size:23px;
        font-family:Arial, Helvetica, sans-serif;
        
    }

    .subtitulo{
        margin:0;
        font-size:14px;
        font-family:Arial, Helvetica, sans-serif;
    }

    .texto_data{
        margin:0;
        font-size:8px;
        font-family:Arial, Helvetica, sans-serif;
    }

    .datas{
        margin-left:15px;
        font-size:11px;
        font-family:Arial, Helvetica, sans-serif;
        margin-top:5px;
    }

    .titulos{
        margin:10px;
    }
    
    .table{
        
        padding:15px;
        font-family:Verdana, sans-serif;
        margin-top:20px;
    }

    .texto-tabela{
        font-size:14px;
    }

    .areaTotais{
		border : 0.5px solid #bcbcbc;
		padding: 10px;
		border-radius: 5px;
        margin-right:15px;
        margin-left:15px;
	}

    </style>

</head>

<body>

<div class='cabecalho'>	
        <div class='titulos'>
            <div align='right' class='texto_data'> {{$data_hoje}}</div>	
            <h5  class='titulo'><b>Assistência Técnica</h5>            
		</div>
</div>

<div class='container'>

<p  align='center' class='titulo'>RELATÓRIO DE ORDEM DE SERVIÇO</p>

<div align='center' class='datas'>
De {{$dataInicial}} à {{$dataFinal}}
</div>


<table class='table' width='100%' border='1' cellspacing='0' cellpadding='3'>
			<tr bgcolor='#f9f9f9'>
                <td style='font-size:15px'> <b>Nº OS</b> </td>
                <td style='font-size:15px'> <b>Cliente</b> </td>
				<td style='font-size:15px'> <b>Data</b> </td>
				<td style='font-size:15px'> <b> Descricao</b> </td>
				<td style='font-size:15px'> <b> Status</b> </td>
                <td style='font-size:15px'> <b> Serviço</b> </td>
                <td style='font-size:15px'> <b> Valor</b> </td>				
            </tr>
                
                @foreach($ordens as $ordem)
                    
                    <tr class='texto-tabela'>
                    <td>
                    {{$ordem->id}}
                    </td>
                    <td>
                    {{$ordem->cliente->nome}}
                    </td>
                    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}</td>

                    <td>
                    {{$ordem->descricao}}
                    </td>
                    <td>
                    {{$ordem->status}}
                    </td>

                    <td>                   
                    @foreach($ordem->servicos as $servico)
                    <p>{{$servico->nome}} </p>             
                    @endforeach 
                    </td>  

                    @if($ordem->valor_pago == null)
                    <td>
                    <p>R$00,00</p>
                    </td>
                    @else

                    <td>
                    R${{$ordem->valor_pago}}
                    </td>
                    @endif
                          
                @endforeach
            </tr>            
            </table>                  

</body>
</html>





















