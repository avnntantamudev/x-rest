<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lista de Vendas</title>
    <style>
        /* Estilos para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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
    <?php
    
    ?>
    <hr>
    <h2>Exmo(a) {{ $venda->nome_cliente }}</h2>
    <h2>Nif nº {{ $venda->contribuente }}</h2>
    <hr>
    <h2>Factura: {{ $venda->cod_documento }}{{ date('Y') }} / {{ $venda->id }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Data/Hora:</th>
                        <th>Modo de Pagamento</th>
                        <th>Valor Recebido</th>
                        <th>Troco</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $venda->created_at }}</td>
                        <td>{{ $venda->forma_pagamento }}</td>
                        <td>{{ $venda->valor_entregue }}kz</td>
                        <td>{{ $venda->troco }}.00kz</td>

                    </tr>
                </tbody>
            </table>
            <h3>Lista dos produtos vendidos</h3>
            <table>
                <thead>
                    <tr>
                        <th>Artigo</th>
                        <th>Descricao</th>
                        <th>Quantidade</th>
                        <th>Preco</th>
                        <th>Total Liquido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->artigo }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->quantidade }}</td>
                            <td>{{ $produto->preco }}kz</td>
                            <td>{{ $produto->preco * $produto->quantidade }}.00kz</td>

                        </tr>
                    @endforeach
                </tbody>

                <tbody>
                    <tr>
                        <td>Valor Total</td>
                        <td></td>
                        <td></td>
                        <td>{{ $venda->preco_total }}.00kz</td>

                    </tr>
                </tbody>
            </table>


            <h3>Processando pelo computador aos <?php echo date('d/m/Y H:i:s'); ?></h3>
</body>

</html>
