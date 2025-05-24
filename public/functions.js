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
            .catch(error => console.error('Erro na verificaÃ§Ã£o da referÃªncia:', error));
    } else {
        aviso.style.display = 'none';
    }
}

function enviarSMS(event) {
    event.preventDefault(); // Impede envio tradicional do form

    let dataHoraBrowser = document.getElementById('dataHora').value;
    let data = new Date(dataHoraBrowser);
    let dataFormatada = data.toLocaleDateString('pt-BR');
    let horaFormatada = data.toLocaleTimeString('pt-BR', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
    });

    let dataHora = `${dataFormatada} as ${horaFormatada}`;

    const form = document.querySelector('form');
    const formData = new FormData(form);

    fetch('index.php/registra-agendamento', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(resultado => {
            if (resultado.sucesso) {
                return fetch(`api-envia-sms.php?dataHora=${encodeURIComponent(dataHora)}`);
            } else {
                throw new Error('Erro ao salvar no banco: ' + resultado.mensagem);
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Agendamento registrado!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '/agendamentos';
                });
            } else {
                Swal.fire({
                    title: 'Erro no SMS',
                    text: 'Agendamento salvo, mas houve erro ao enviar SMS: ' + data.mensagem,
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                title: 'Erro!',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
}
function buscarCEP() {
    console.log('Função chamada!'); // Para debug

    const cep = document.getElementById('cep').value.replace(/\D/g, '');

    // Verifica se tem 8 dígitos
    if (cep.length !== 8) {
        alert('CEP deve ter 8 dígitos');
        return;
    }

    console.log('Buscando CEP:', cep); // Para debug

    // Faz a requisição
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            console.log('Dados recebidos:', data); // Para debug

            if (data.erro) {
                alert('CEP não encontrado!');
                return;
            }

            // Preenche os campos
            document.getElementById('logradouro').value = data.logradouro || '';
            document.getElementById('bairro').value = data.bairro || '';
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao buscar CEP');
        });
}

// Adiciona o evento quando a página carregar
window.onload = function() {
    const cepInput = document.getElementById('cep');

    // Busca CEP quando sair do campo
    cepInput.onblur = buscarCEP;

    // Formatação simples
    cepInput.oninput = function() {
        let valor = this.value.replace(/\D/g, '');
        if (valor.length > 5) {
            valor = valor.slice(0, 5) + '-' + valor.slice(5, 8);
        }
        this.value = valor;
    };
};