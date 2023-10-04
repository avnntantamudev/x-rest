
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Clientes</title>
    <style>
        /* Estilos para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para os botões */
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /* Estilos específicos para o botão "Imprimir em PDF" */
        #meuBotao {
            background-color: #4CAF50;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Lista de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Cod. Cliente</th>
                <th>Nome</th>
                <th>Pais</th>
                <th>Provincia</th>
                <th>Contribuente</th>
                <th>Espaço Fiscal</th>
                <th>Regime do IVA</th>
                <th>Tipo de Pessoa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->pais}}</td>
                <td>{{$cliente->provincia}}</td>
                <td>{{$cliente->n_contribuente}}</td>
                <td>{{$cliente->espaco_fiscal}}</td>
                <td>{{$cliente->regime_iva}}</td>
                <td>{{$cliente->pessoa}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 

   <h3>Processando pelo computador aos <?php echo (date("d/m/Y H:i:s")) ?></h3>
</body>
</html>
