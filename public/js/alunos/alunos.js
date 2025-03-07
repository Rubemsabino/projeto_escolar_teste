// Digita a data de nascimento e no campo idade já vem a idade
function calcularIdade() {
    const dataNascimento = document.getElementById('data_de_nascimento').value;
    const dataAtual = new Date();
    const nascimento = new Date(dataNascimento);

    let idade = dataAtual.getFullYear() - nascimento.getFullYear();
    const mesAtual = dataAtual.getMonth();
    const mesNascimento = nascimento.getMonth();

    // Ajusta a idade caso ainda não tenha feito aniversário no ano atual
    if (mesAtual < mesNascimento || (mesAtual === mesNascimento && dataAtual.getDate() < nascimento.getDate())) {
        idade--;
    }

    document.getElementById('idade').value = idade;
}

// Traz cidade junto com o estado
document.getElementById('naturalidade').addEventListener('input', async function () {
    let cidadeDigitada = this.value.replace(/-.*/, '').trim(); // Remove qualquer sigla antiga
    if (cidadeDigitada.length > 2) { // Só busca se tiver mais de 2 caracteres
        try {
            let response = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios`);
            let cidades = await response.json();

            let cidadeEncontrada = cidades.find(c => c.nome.toLowerCase() === cidadeDigitada.toLowerCase());

            if (cidadeEncontrada) {
                let estado = cidadeEncontrada.microrregiao.mesorregiao.UF.sigla;
                this.value = `${cidadeEncontrada.nome}-${estado}`; // Define a cidade no formato correto
                document.getElementById('nacionalidade').value = "Brasil"; // Define o país automaticamente
            }
        } catch (error) {
            console.error("Erro ao buscar cidade:", error);
        }
    }
});

// Mascara para o CPF
document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    value = value.substring(0, 11); // Garante no máximo 11 números

    // Aplica a máscara no formato ###.###.###-##
    if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2})$/, '$1.$2.$3-$4');
    } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3})$/, '$1.$2.$3');
    } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3})$/, '$1.$2');
    }

    e.target.value = value; // Atualiza o campo com o valor formatado
});

// Mascara para a certidao
function mascaraCertidaoNascimento(input) {
    let value = input.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    let formato = '###### ## ## #### # ##### ### ####### ##'; // Define o formato da máscara

    let i = 0;
    input.value = formato.replace(/#/g, function () {
        return value[i++] || ''; // Substitui os # pela sequência de números
    });
}

// Mascara para o celular
function mascaraCelular(input) {
    let value = input.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    let formato = '(##) #.####.####'; // Define o formato da máscara

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
                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('bairro').value = data.bairro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                } else {
                    alert('CEP não encontrado!');
                }
            })
            .catch(error => console.error('Erro ao buscar o CEP:', error));
    } else {
        if (cep.length > 0) { // Só exibe erro se o usuário digitou algo
            alert('CEP inválido!');
        }
    }
});


// Digita a data de nascimento e no campo idade_responsavel já vem a idade
function calcularIdade_responsavel() {
    const dataNascimento = document.getElementById('data_de_nascimento_responsavel').value;
    const dataAtual = new Date();
    const nascimento = new Date(dataNascimento);

    let idade = dataAtual.getFullYear() - nascimento.getFullYear();
    const mesAtual = dataAtual.getMonth();
    const mesNascimento = nascimento.getMonth();

    // Ajusta a idade caso ainda não tenha feito aniversário no ano atual
    if (mesAtual < mesNascimento || (mesAtual === mesNascimento && dataAtual.getDate() < nascimento.getDate())) {
        idade--;
    }

    document.getElementById('idade_responsavel').value = idade;
}

// Mascara para o CPF responsavel
document.getElementById('cpf_responsavel').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
    value = value.substring(0, 11); // Garante no máximo 11 números

    // Aplica a máscara no formato ###.###.###-##
    if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{0,2})$/, '$1.$2.$3-$4');
    } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{0,3})$/, '$1.$2.$3');
    } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{0,3})$/, '$1.$2');
    }

    e.target.value = value; // Atualiza o campo com o valor formatado
});

// Traz cidade junto com o estado do resposável
document.getElementById('naturalidade_responsavel').addEventListener('input', async function () {
    let cidadeDigitada = this.value.replace(/-.*/, '').trim(); // Remove qualquer sigla antiga
    if (cidadeDigitada.length > 2) { // Só busca se tiver mais de 2 caracteres
        try {
            let response = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios`);
            let cidades = await response.json();

            let cidadeEncontrada = cidades.find(c => c.nome.toLowerCase() === cidadeDigitada.toLowerCase());

            if (cidadeEncontrada) {
                let estado = cidadeEncontrada.microrregiao.mesorregiao.UF.sigla;
                this.value = `${cidadeEncontrada.nome}-${estado}`; // Define a cidade no formato correto
                document.getElementById('nacionalidade_responsavel').value = "Brasil"; // Define o país automaticamente
            }
        } catch (error) {
            console.error("Erro ao buscar cidade:", error);
        }
    }
});

// Mascara para o celular_responsavel
function mascaraCelular_responsavel(input) {
    let value = input.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
    let formato = '(##) #.####.####'; // Define o formato da máscara

    let i = 0;
    input.value = formato.replace(/#/g, function () {
        return value[i++] || ''; // Substitui os # pela sequência de números
    });
}

// CEP responsavel
document.getElementById('cep_responsavel').addEventListener('blur', function () {
    let cep_responsavel = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cep_responsavel.length === 0) return; // Se o campo estiver vazio, não faz nada

    if (cep_responsavel.length === 8) { // Verifica se tem 8 dígitos
        fetch(`https://viacep.com.br/ws/${cep_responsavel}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('rua_responsavel').value = data.logradouro;
                    document.getElementById('bairro_responsavel').value = data.bairro;
                    document.getElementById('cidade_responsavel').value = data.localidade;
                    document.getElementById('estado_responsavel').value = data.uf;
                } else {
                    alert('CEP não encontrado!');
                }
            })
            .catch(error => console.error('Erro ao buscar o CEP:', error));
    } else {
        if (cep_responsavel.length > 0) { // Só exibe erro se o usuário digitou algo
            alert('CEP inválido do responsável!');
        }
    }
});

// escolha de parentesco
document.addEventListener("DOMContentLoaded", function () {
    const parentesco = document.getElementById("parentesco");
    const nomeCompletoResponsavel = document.getElementById("nome_completo_responsavel");
    const nomePai = document.getElementById("pai");
    const nomeMae = document.getElementById("mae");

    if (!parentesco || !nomeCompletoResponsavel || !nomePai || !nomeMae) {
        console.error("❌ Um ou mais elementos não foram encontrados no DOM!");
        return;
    }

    parentesco.addEventListener("change", function () {
        console.log("✅ Parentesco selecionado:", parentesco.value);
        console.log("📝 Nome do Pai:", nomePai.value);
        console.log("📝 Nome da Mãe:", nomeMae.value);

        // Define um valor padrão antes de preencher
        let nomeResponsavel = "";

        if (parentesco.value.toLowerCase() === "pai") {
            nomeResponsavel = nomePai.value;
        } else if (parentesco.value.toLowerCase() === "mae") {
            nomeResponsavel = nomeMae.value;
        }

        console.log("✅ Nome preenchido antes da atribuição:", nomeResponsavel);

        // Força a atualização do campo no DOM
        nomeCompletoResponsavel.value = nomeResponsavel;
        nomeCompletoResponsavel.setAttribute("value", nomeResponsavel);
        nomeCompletoResponsavel.dispatchEvent(new Event('input'));

        console.log("✅ Nome preenchido após atribuição:", nomeCompletoResponsavel.value);
    });
});

// edita o campo data de nascimento aluno e preenche a idade
function calcularIdade() {
    let dataNascimento = document.getElementById("data_de_nascimento").value;
    let idadeInput = document.getElementById("idade");

    if (dataNascimento) {
        let hoje = new Date();
        let nascimento = new Date(dataNascimento);
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        let mes = hoje.getMonth() - nascimento.getMonth();

        // Ajusta se ainda não fez aniversário este ano
        if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }

        idadeInput.value = idade;
    } else {
        idadeInput.value = "";
    }
}

// Calcula a idade automaticamente ao carregar a página se houver um valor salvo
document.addEventListener("DOMContentLoaded", function() {
    // Verifica se o campo de data de nascimento do responsável já tem um valor e, se tiver, calcula a idade
    if (document.getElementById("data_de_nascimento_responsavel").value) {
        calcularIdadeResponsavel();
    }
});

// Função para calcular a idade do responsável com base na data de nascimento
// Calcula a idade automaticamente ao carregar a página se houver um valor salvo
document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById("data_de_nascimento_responsavel").value) {
        calcularIdadeResponsavel();
    }
});

// Função para calcular a idade do responsável com base na data de nascimento
function calcularIdadeResponsavel() {
    let dataNascimento = document.getElementById("data_de_nascimento_responsavel").value;
    let idadeInput = document.getElementById("idade_responsavel");

    if (dataNascimento) {
        let hoje = new Date();
        let nascimento = new Date(dataNascimento);
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        let mes = hoje.getMonth() - nascimento.getMonth();

        // Ajusta se ainda não fez aniversário este ano
        if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
            idade--;
        }

        idadeInput.value = idade;
    } else {
        idadeInput.value = "";
    }
}
// data atual
document.addEventListener("DOMContentLoaded", function () {
    let hoje = new Date().toISOString().split("T")[0];
    document.getElementById("data_de_ingresso").value = hoje;
});

