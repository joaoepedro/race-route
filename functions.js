function verificaReferencia(origem) {
    const referencia = document.getElementById('referencia').value;
    const aviso = document.getElementById('aviso-referencia');
    let botaoValidar = origem === 'registraEstoque'
        ? document.getElementById('registraEstoque')
        : document.getElementById('cadastraProduto');


    if (referencia) {
        fetch(`valida-referencia.php?referencia=${referencia}`)
            .then(response => response.json())
            .then(data => {
                if ((data.existe && origem === "cadastraProduto") || (!data.existe && origem === "registraEstoque")) {
                    aviso.style.display = 'block';
                    botaoValidar.disabled = true;
                } else {
                    aviso.style.display = 'none';
                    botaoValidar.disabled = false;
                }

            })
            .catch(error => console.error('Erro na verificação da referência:', error));
    } else {
        aviso.style.display = 'none';
    }
}

// Função para mostrar ou esconder o campo de referência do produto no registro de serviços
function toggleReferencia(show) {
    const referenciaGroup = document.getElementById('referenciaProdutoGroup');
    if (show) {
        referenciaGroup.classList.remove('hidden');
    } else {
        referenciaGroup.classList.add('hidden');
    }
}

function loadContent(linkId, filePath) {
    document.getElementById(linkId).addEventListener('click', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do link

        // Faz uma requisição para o arquivo PHP
        fetch(filePath)
            .then(response => response.text())
            .then(data => {
                // Insere o conteúdo do arquivo PHP na div .content
                document.getElementById('content').innerHTML = data;
            })
            .catch(error => console.error('Erro ao carregar o arquivo:', error));
    });
}

