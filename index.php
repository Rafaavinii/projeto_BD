<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Projeto BD - Início</title>

</head>
<body>
    
    <div id="container">
        <div id="header-container">
            <header>
                <a href="index.php" class="a-limpo" id="logo"><h1>LOGO</h1></a>
    
                <div id="barra-de-pesquisa">
                    <input type="text" placeholder="Pesquisar Produto" class="input-limpo">
                    <button><i class="fas fa-search"></i></button>
                </div>
    
                <a href="cadastrar-produto.php" class="a-decorado">Cadastrar Produto</a>
            </header>
        </div>

        <div id="main">
            <nav id="menu-lateral">
                <h4>Categoria</h4>
                <ul class="ul-limpa">
                    <li>
                        <input type="checkbox" value="pc">
                        <label>PC</label>
                    </li>
                    <li>
                        <input type="checkbox" value="hardware">
                        <label>Hardware</label>
                    </li>
                    <li>
                        <input type="checkbox" value="perifericos">
                        <label>Periféricos</label>
                    </li>
                    <li>
                        <input type="checkbox" value="monitores">
                        <label>Monitores</label>
                    </li>
                    <li>
                        <input type="checkbox" value="notebooks">
                        <label>Notebooks</label>
                    </li>
                </ul>
            </nav>

            <div id="lista-produtos">
                
            </div>
        </div>
    </div>

    <script>
        window.onload = () => {
            ajax = new XMLHttpRequest()
            ajax.open('POST', 'busca-dados.php', true)
            ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
            ajax.send()
            ajax.onreadystatechange = () => {
                if(ajax.readyState == 4 && ajax.status == 200) {
                    dados = JSON.parse(ajax.response)
                    console.log(dados)
                }
            }

            for(let i=0; i < 60; i++) {
                criarCard()
            }
        }

        function criarCard(id, nome, categoria) {
            let lista = document.getElementById('lista-produtos')

            let card = document.createElement('div')
            let imagem = document.createElement('img')
            let dados = document.createElement('div')
            let idProduto = document.createElement('p')
            let nomeProduto = document.createElement('p')
            let categoriaProduto = document.createElement('p')

            card.className = 'card'

            imagem.src = 'data:image/jpeg;base64,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'
            idProduto.innerText = 'Id: ' + 0
            nomeProduto.innerText = 'Nome: Produto'
            categoriaProduto.innerText = 'Categoria: Categoria'
            
            dados.appendChild(idProduto)
            dados.appendChild(nomeProduto)
            dados.appendChild(categoriaProduto)
            card.appendChild(imagem)
            card.appendChild(dados)
            lista.appendChild(card)
        }
    </script>

</body>
</html>