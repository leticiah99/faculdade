
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório</title>
    </head>
    <body>
      
           
           <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">NOME</th>
                <th scope="col">TELEFONE</th>    
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->telefone}}</td> 
            </tbody>

            </table>

            
           <h4 id="center"><b>ORDENS DE SERVIÇO</b> </h4>
            
    
            @foreach($cliente->ordens as $ordem)
            

                <h2>{{$ordem->data_inicial}}</h2>
                <h2>{{$ordem->descricao}}</h2>
                <h2>{{$ordem->tipo_servico}}</h2>
                <h2>{{$ordem->status}}</h2>   

            @endforeach
             

        
    </body>
</html>
