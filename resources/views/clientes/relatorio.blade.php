<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório</title>

        <style>  
        
            table, th, td{
                padding:5px;
                font-family:Verdana, sans-serif;
                margin-top:10px;
                
            }
        </style>

    </head>
    <body>
      
    <div class='container'>
           
                    
           <h4 id="center"><b>ORDENS DE SERVIÇO</b> </h4>
            
           <table class='table' width='100%' border='1' cellspacing='0' cellpadding='3'>
>
           <tr>
                <th>CLIENTE</th>
                <th>DATA</th>
                <th>DESCIÇÃO</th>    
                <th>STATUS</th>   
                <th>VALOR</th>    
                <th>SERVICO</th>   
 
            </tr>
            @foreach($cliente->ordens as $ordem)
            <tr>
                <td>{{$cliente->nome}}</td>
                <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($ordem->data_inicial))->format('d/m/Y')}}</td>
                <td>{{$ordem->descricao}}</td>
                <td>{{$ordem->status}}</td> 
                <td>R${{$ordem->valor_pago}}</td>
                <td>
                <table class='table' cellspacing='0' cellpadding="0">
                @foreach($ordem->servicos as $servico)
                
                    <td>{{$servico->nome}} </td>             
                
                @endforeach 
                </table> 
                </td>
            </tr>

            <!--
                @foreach($ordem->produtos as $produto)

                
                    <td>{{$produto->nome}} </td>      
                @endforeach           
            </tr>
            -->
            @endforeach

        </body>
    </div>
        
  
</html>
