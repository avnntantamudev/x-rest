@section('title','Documento')
@extends('web.app')
@extends('funcionario.import')
<style>
    h1 {
        text-align: center;
        color: #fff;
        padding: 20px;
        margin: 0;
    }

    label, input, button {
        display: block;
        margin: 10px 0;
    }

    table {
        margin-top: 20px;
        border-collapse: collapse;
        width: 100%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #preco-total {
        font-weight: bold;
        font-size: 18px;
        margin-top: 10px;
    }

    .produto-selecionado {
        background-color: #ffff99;
    }

    .acoes {
        text-align: center;
    }

    .acoes button {
        padding: 5px 10px;
        font-size: 14px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .acoes button:hover {
        background-color: #555;
    }
    #botao-finalizar {
        display: none;
        text-align: center;
        margin-top: 10px;
    }
    
    /* Estilos para o modal */
/* Estilos para o modal de pagamento */
#modalFinalizarCompra {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%; /* Ajuste a largura conforme necessário */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}

/* Estilo para o formulário dentro do modal */
#formFinalizarCompra {
    display: flex;
    flex-direction: column;
}

/* Estilo para o botão de finalizar compra dentro do modal */
#formFinalizarCompra button {
    margin-top: 10px;
    padding: 10px;
    font-size: 16px;
    background-color: #4CAF50; /* Cor verde - ajuste conforme sua preferência */
    color: white;
    border: none;
    cursor: pointer;
}

#formFinalizarCompra button:hover {
    background-color: #45a049; /* Efeito hover - ajuste conforme sua preferência */
}


</style>

<script>
    let itensSelecionados = [];
    let precoTotal = 0;
    let cliente = 0;

    // Adicione um ouvinte de evento para o campo de entrada do valor entregue


    function selecionarProduto(row) {
        const idProduto = row.cells[0].textContent;
        const nomeProduto = row.cells[1].textContent;
        const precoProduto = parseFloat(row.cells[2].textContent);
        const descricaoProduto = row.cells[3].textContent;
        const unidadProduto = row.cells[4].textContent;
        const componenteProduto = row.cells[5].textContent;
        const cliente = row.cells[6].textContent;

        const produtoExistente = itensSelecionados.find(item => item.nome === nomeProduto);
        if (produtoExistente) {
            produtoExistente.quantidade++;
        } else {
            itensSelecionados.push({ 
                nome: nomeProduto, 
                preco: precoProduto, 
                id: idProduto, 
                descricao: descricaoProduto, 
                unidade: unidadProduto, 
                componente: componenteProduto,
                cliente: cliente,
                quantidade: 1 
            });
        }

        atualizarTabelaItens();
        row.parentNode.removeChild(row);
        calcularPrecoTotal();
    }

    function removerItem(index) {
        const item = itensSelecionados[index];
        if (item.quantidade > 1) {
            item.quantidade--;
        } else {
            itensSelecionados.splice(index, 1);
            const tabelaProdutos = document.getElementById('data-table-basic').getElementsByTagName('tbody')[0];
            const linha = tabelaProdutos.insertRow(0);
            linha.innerHTML = `
                <td>${item.id}</td>
                <td>${item.nome}</td>
                <td>${item.preco.toFixed(2)}</td>
                <td>${item.descricao}</td>
                <td>${item.unidade}</td>
                <td>${item.componente}</td>
                
            `;
            linha.onclick = function () {
                selecionarProduto(this);
            };
        }

        atualizarTabelaItens();
        calcularPrecoTotal();
    }

    function atualizarTabelaItens() {
        const tabelaCorpo = document.getElementById('tabela-corpo-itens');
        tabelaCorpo.innerHTML = '';

        itensSelecionados.forEach((item, index) => {
            const linha = document.createElement('tr');
            linha.innerHTML = `
                <td>${item.nome}</td>
                <td>${item.preco.toFixed(2)}</td>
                <td>
                    <button class="acao-button" onclick="removerItem(${index})">-</button>
                    <span class="quantidade">${item.quantidade}</span>
                    <button class="acao-button" onclick="adicionarItem(${index})">+</button>
                </td>
            `;
            tabelaCorpo.appendChild(linha);
        });
        const botaoFinalizar = document.getElementById('botao-finalizar');
            if (itensSelecionados.length > 0) {
                botaoFinalizar.style.display = 'block';
            } else {
                botaoFinalizar.style.display = 'none';
            }
    }

    function calcularPrecoTotal() {
        precoTotal = itensSelecionados.reduce((total, item) => total + (item.preco * item.quantidade), 0);
        const precoTotalElement = document.getElementById('preco-total-valor');
        precoTotalElement.textContent = precoTotal.toFixed(2);

        // Atualiza o valor total no formulário
        const valorTotalInput = document.getElementById('valor');
        valorTotalInput.value = precoTotal.toFixed(2);
    }
    function adicionarItem(index) {
        itensSelecionados[index].quantidade++;
        atualizarTabelaItens();
        calcularPrecoTotal();
    }
    function finalizarCompra() {
        const produtos = itensSelecionados.map(item => ({
            nome: item.nome,
            preco: item.preco,
            id: item.id,
            descricao: item.descricao,
            unidade: item.unidade,
            componente: item.componente,
            cliente: item.cliente,
            quantidade: item.quantidade,
            preco_total: precoTotal
        }));
        calcularTroco();
    const url = "{{ route('funcionario.finalizarCompra') }}";

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ produtos })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        calcularPrecoTotal();
        abrirModal();
    })
    .catch(error => {
        console.error('Erro ao finalizar a compra:', error);
    });
}

function abrirModal() {
    const modal = document.getElementById('modalFinalizarCompra');
    modal.style.display = 'block';
}

function fecharModal() {
    const modal = document.getElementById('modalFinalizarCompra');
    modal.style.display = 'none';
}
function calcularTroco() {
    const valorEntregue = parseFloat(document.querySelector('input[name="valor_entregue"]').value);
    const trocoElement = document.getElementById('troco');
    const troco = isNaN(valorEntregue) ? 0 : (valorEntregue - precoTotal);
    trocoElement.value = troco.toFixed(2);
}

function enviarCompra() {
    const formaPagamento = document.querySelector('select[name="forma_pagamento"]').value;
    const valorEntregue = parseFloat(document.querySelector('input[name="valor_entregue"]').value);
    document.getElementById('troco').value = 0;
    
    if (!formaPagamento || isNaN(valorEntregue)) {
        alert('Por favor, preencha corretamente a forma de pagamento e o valor entregue.');
        return;
    }

    // Restante do código para finalizar a compra...

    // Verifica se o valor entregue é igual ao valor total
    if (valorEntregue === precoTotal) {
        alert('Compra finalizada com sucesso!');
        
       
    } else if(valorEntregue < precoTotal) {
        const troco = precoTotal - valorEntregue;
        alert('O valor entregue é inferior ao preco total\n Acrescente '+troco.toFixed(2)+'kz');
        return;
    }else if(valorEntregue > precoTotal) {
        const troco = valorEntregue - precoTotal;
        document.getElementById('troco').value = troco.toFixed(2);
        alert('Compra finalizada com sucesso!\n O troco é de '+troco.toFixed(2)+'kz');
    }
    

    // Limpa a lista de itens selecionados e atualiza a tabela
    gerarArquivoTXT(itensSelecionados);
    itensSelecionados = [];
    atualizarTabelaItens();
    calcularPrecoTotal();
    abrirModal();
    // Lógica para enviar dados do formulário, se necessário
    // Pode ser outra requisição AJAX ou qualquer lógica específica
    // Após enviar com sucesso, fechar o modal ou realizar outra ação desejada
    fecharModal();
}

</script>
<style>
    .acao-button {
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        margin: 0 5px;
    }

    .quantidade {
        font-weight: bold;
        font-size: 16px;
    }
</style>
@section('container') 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class="form-element-area">
    <div class="container">
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group"> 
                    <a href="{{route('funcionario.documento')}}">
                        <button class="btn btn-primary notika-btn-primary">Novo</button>
                    </a>
                    <a href="{{route('funcionario.cliente.listar')}}">
                        <button class="btn btn-success notika-btn-success">Listar</button>
                    </a>
                    <a href="{{route('funcionario.cliente.listar')}}">
                        <button class="btn btn-warning notika-btn-warning">Imprimir</button>
                    </a>
                    <a href="{{route('funcionario.cliente.listar')}}">
                        <button class="btn btn-warning notika-btn-warning">Duplicar</button>
                    </a>
                    <a href="{{route('funcionario.artigo')}}">
                        <button class="btn btn-primary notika-btn-primary">Artigo</button>
                    </a>
                    <a href="{{route('funcionario.facturas')}}">
                        <button class="btn btn-primary notika-btn-primary">Facturas</button>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="bootstrap-select fm-cmp-mg">
                        <label for="">Entidade</label>
                        <form action="{{route('funcionario.select')}}" method="POST">
                            @csrf
                            <select id="estado" class="selectpicker" name="id_cliente" onchange="this.form.submit()">
                                    @if (isset($cliente))
                                        <option>{{$cliente->nome}}</option>
                                    @else
                                        <option></option>
                                    @endif

                                    @foreach ($entidades as $entidade)
                                        <option value="{{$entidade->id}}">{{$entidade->nome}}</option> 
                                    @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <form action="{{route('funcionario.cliente.store')}}" method="POST">
                    @csrf
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Dados do Documento</h2>
                            <hr>
                        </div>
                        @if (isset($cliente))
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="nome" id="cliente_nome" class="form-control" value="{{$cliente->nome}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pais" class="form-control" value="{{$cliente->pais}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="provincia" class="form-control" value="{{$cliente->provincia}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="n_contribuente" id="contribuente" class="form-control" value="{{$cliente->n_contribuente}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pessoa" class="form-control" value="{{$cliente->pessoa}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" name="pessoa" class="form-control" value="{{$cliente->dadosComercial->tipo_preco}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label>Data e Hora do documento</label>
                                    <div class="nk-int-st">
                                        <input type="datetime-local" name="hora_documento" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label>Data de Vencimento</label>
                                    <div class="nk-int-st">
                                        <input type="date" name="data_vencimento" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <hr>
                        </div>
                        
                        </div>
                    </div>
                </form>
                @if (isset($cliente))
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="data-table-list">
                                <div class="basic-tb-hd">
                                    <h2>Artigos</h2>
                                </div>
                                <div class="table-responsive">
                                    <table id="data-table-basic" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Cod. artigo</th>
                                                <th>Artigo</th>
                                                <th>Preço</th>
                                                <th>Descricao</th>
                                                <th>Unidade Base</th>
                                                <th>Componente</th>
                                                <th hidden>Cliente</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabela-corpo-produtos">
                                            @foreach ($artigos as $artigo)
                                                <tr onclick="selecionarProduto(this)">
                                                    <td>{{$artigo->id}}</td>
                                                    <td>{{$artigo->artigo}}</td>
                                                    <td>{{$artigo->pvp1}}</td>
                                                    <td>{{$artigo->descricao}}</td>
                                                    <td>{{$artigo->unidade_base}}</td>
                                                    <td>{{$artigo->componente}}</td>
                                                    <td hidden>{{$cliente->id}}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="data-table-list">
                                <div class="basic-tb-hd">
                                    <h2>Produtos Selecionados</h2>
                                </div>
                                <table id="tabela-itens" border="1">
                                    <thead>
                                        <tr>
                                            <th>Nome do Produto</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela-corpo-itens">
                                        <!-- Aqui serão adicionados os itens selecionados -->
                                    </tbody>
                                </table>
                                
                                <div id="preco-total">Preço Total:<span id="preco-total-valor">0.00 KZ</span></div>
                                <input type="hidden" id="itens_selecionados" name="itens_selecionados" value="">
                                <div id="botao-finalizar">
                                    <button onclick="finalizarCompra()">Finalizar Venda</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- Modal HTML -->
        <div id="modalFinalizarCompra" class="modal">
            <div class="modal-content">
                <span class="close" onclick="fecharModal()">&times;</span>
                <h2>Finalizar Venda</h2>
                <form id="formFinalizarCompra">
                    <!-- Seus campos de formulário aqui -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <label for="">Forma de Pagamento</label>
                                <select class="selectpicker" id="forma_pagamento" name="forma_pagamento" required>
                                        <option value=""></option>
                                        <option value="Kwanzas">Kwanzas</option>
                                        <option value="Multicaixa">Multicaixa</option>
                                        <option value="Quarto">Quarto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label>Valor Entregue</label>
                                <div class="nk-int-st">
                                    <input type="number" id="valor_entregue" name="valor_entregue" class="form-control" placeholder="Valor Entregue" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="valor">Valor Total</label>
                                <input type="text" class="form-control" id="valor" name="valor" readonly>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group">
                                <label for="troco">Troco/Em Falta</label>
                                <input type="text" class="form-control" id="troco" name="troco" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="enviarCompra()">Finalizar Compra</button>
                </form>
            </div>
        </div>
<script>
    document.querySelector('input[name="valor_entregue"]').addEventListener('input', calcularTroco);

    function gerarArquivoTXT(produtosSelecionados) {
        // Verifica se há produtos selecionados  
        let dataHoraAtual = new Date();
        let cliente = document.querySelector("#cliente_nome").value;
        let contribuente = document.querySelector("#contribuente").value;
        let forma_pagamento = document.querySelector("#forma_pagamento").value;
        let valor_entregue = document.querySelector("#valor_entregue").value;
        let troco = document.querySelector("#troco").value;


        let dia = dataHoraAtual.getDate();
        let mes = dataHoraAtual.getMonth() + 1; // Lembre-se que os meses começam do zero
        let ano = dataHoraAtual.getFullYear();
        let horas = dataHoraAtual.getHours();
        let minutos = dataHoraAtual.getMinutes();
        let segundos = dataHoraAtual.getSeconds();

        // Adicione um zero à esquerda se for menor que 10
        mes = mes < 10 ? `0${mes}` : mes;
        dia = dia < 10 ? `0${dia}` : dia;
        horas = horas < 10 ? `0${horas}` : horas;
        minutos = minutos < 10 ? `0${minutos}` : minutos;
        segundos = segundos < 10 ? `0${segundos}` : segundos;

        // Crie uma string formatada
        let dataformatada = `${dia}/${mes}/${ano}`;
        let horaformatada = `${horas}:${minutos}:${segundos}`;

        const produtos = itensSelecionados.map(item => ({
            nome: item.nome,
            preco: item.preco,
            id: item.id,
            descricao: item.descricao,
            unidade: item.unidade,
            componente: item.componente,
            cliente: cliente,
            quantidade: item.quantidade,
            preco_total: precoTotal,
            contribuente: contribuente,
            forma_pagamento: forma_pagamento,
            valor_entregue: valor_entregue,
            troco: troco,
            id_cliente: item.cliente,

        }));


        if (produtosSelecionados.length === 0) {
            alert('Nenhum produto selecionado para gerar o arquivo.');
            return;
        }
        const url = "{{ route('funcionario.finalizarComprapdf') }}";

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ produtos })
        })
        .then(response => response.json())
        .then(data => {
            fecharModal();
            console.log(data);
            alert('Venda finalizada com sucesso!');
        })
        .catch(error => {
            console.error('Erro ao finalizar a compra:', error);
        });
    }
</script>
    </div>
</div>
@endsection