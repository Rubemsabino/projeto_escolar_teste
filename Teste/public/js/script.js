console.log("SweetAlert2 funcionando!");

// Mascara para o CNPJ
document.getElementById('cnpj').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    value = value.substring(0, 14); // Garante no máximo 14 números

    // Aplica a máscara no formato ##.###.###/####-##
    if (value.length > 12) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{0,2})$/, '$1.$2.$3/$4-$5');
    } else if (value.length > 8) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{0,4})$/, '$1.$2.$3/$4');
    } else if (value.length > 5) {
        value = value.replace(/^(\d{2})(\d{3})(\d{0,3})$/, '$1.$2.$3');
    } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{0,3})$/, '$1.$2');
    }

    e.target.value = value; // Atualiza o campo com o valor formatado
});

// Mascara para o celular
function mascaraCelular(input) {
    let value = input.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    let formato = '(##) #.####-####'; // Define o formato da máscara

    let i = 0;
    input.value = formato.replace(/#/g, function () {
        return value[i++] || ''; // Substitui os # pela sequência de números
    });
}

// mascara CEP
document.getElementById('cep').addEventListener('input', function (e) {
    let cep = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cep.length > 5) {
        cep = cep.substring(0, 5) + '-' + cep.substring(5, 8);
    }

    e.target.value = cep;
});

// CEP aluno
document.getElementById('cep').addEventListener('blur', function () {
    let cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cep.length === 0) return; // Se o campo estiver vazio, não faz nada

    if (cep.length === 8) { // Verifica se tem 8 dígitos
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    // Preenche os campos de endereço
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                    document.getElementById('estado').value = data.uf || '';

                    // Define o país como Brasil por padrão
                    document.getElementById('pais').value = 'Brasil';

                    // Foca no próximo campo (número, se existir)
                    const numeroField = document.getElementById('numero');
                    if (numeroField) {
                        numeroField.focus();
                    }
                } else {
                    alert('CEP não encontrado!');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar o CEP:', error);
                alert('Erro ao consultar o CEP. Por favor, tente novamente.');
            });
    } else {
        if (cep.length > 0) { // Só exibe erro se o usuário digitou algo
            alert('CEP inválido! Deve conter 8 dígitos.');
        }
    }
});

// mascara portaria escolar
document.getElementById('ato_criacao').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    value = value.substring(0, 7); // Limita a 7 caracteres (3 para número + 4 para ano)

    // Formatação: XXX/YYYY
    if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,4})$/, '$1/$2');
    }

    e.target.value = value; // Atualiza o campo
});

// mascara inscrição estadual no caso Pernanbucano
document.getElementById('inscricao_estadual').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito
    value = value.substring(0, 14); // Limita ao tamanho máximo (14 dígitos)

    // Aplica a máscara: ##.#.###.#######-#
    if (value.length > 9) {
        value = value.replace(/^(\d{2})(\d{1})(\d{3})(\d{7})(\d{1})$/, '$1.$2.$3.$4-$5');
    } else if (value.length > 6) {
        value = value.replace(/^(\d{2})(\d{1})(\d{3})(\d{0,7})$/, '$1.$2.$3.$4');
    } else if (value.length > 3) {
        value = value.replace(/^(\d{2})(\d{1})(\d{0,3})$/, '$1.$2.$3');
    } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{0,1})$/, '$1.$2');
    }

    e.target.value = value;
});

// mascara inscrição municipal Caruaru-PE
document.getElementById('inscricao_municipal').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito
    value = value.substring(0, 10); // Limita a 11 dígitos (formato padrão)

    // Aplica a máscara: 000.000.000-0 (formato comum em Caruaru)
    if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4');
    } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3})$/, '$1.$2.$3');
    } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3})$/, '$1.$2');
    }

    e.target.value = value;
});