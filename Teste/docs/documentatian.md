 [
    Site Oficial documentação do Mark Dawn
 ](https://docs.pipz.com/central-de-ajuda/learning-center/guia-basico-de-markdown#open)
 
 # Projeto Laravel, a ordem ideal para começar depende da abordagem e da funcionalidade que você quer implementar. Aqui está uma sugestão lógica e prática para organizar o trabalho:

 # menu
- [0. PROJETO SISTEMA ESCOLAR COMPLETO.](projeto.md)
- [J1. ETAPAS EXTRUTURADAS DE UM SISTEMA MULTIESCOLAR.](J.como_iniciar.md)

- [1. INSTALAÇÃO DO XAMPP E O COMPOSER.]()
- [2. ORGANIZANDO O AMBIENTE PARA A CRIAÇÃO.](organizando_ambiente.md)
- [3. ARMAZENAR O PROJETO LARAVEL NO GITHUB.](armazenar_github.md)
- [4. DANDO INICIO AO PROJETO INSTALADO JETSTREAM NO LARAVEL.](instalando_jetstream.md)
- [5. MODIFICANDO OS ARGUIVOS QUE VEM NO JETSTREAM.](modificando.md)
- [6. CRIAÇÃO DE DASHBOARDS DIFERENTES PARA CADA USUÁRIO.](dashboards.md)
- [7. CRIANDO: MODEL, MIGRATIONS, CONTROLER RESOURCE FACTORYES E SEEDERS.](criacao_model_mcrfs.md)
- [8. MIGRATIONS.](inicio_ao_projeto_migrations)
- [9. MODELS.](models.md)
- [10. FACTORIES.](factorires.md)
- [11. SEEDERS.](seeders.md)
- [12. CONTROLLER.](controllers.md)
- [13. ROTAS.](rotas.md)
- [14. VIEWS.](views.md)
- [15. ALTERAÇÕES NO BANCO DE DADOS.](Alteracoes_no_BD.md)

 # Extras
- [RODAR PROJETO NO CELULAR.](rodar_celular.md)
- [ALTERAR FORMULÁRIO.](alterar_formulario.md)

CRUD
https://imasters.com.br/php/como-fazer-um-crud-no-laravel-do-zero-parte-1
https://imasters.com.br/php/como-fazer-um-crud-no-laravel-do-zero-parte-2

https://help.sistemaquality.com.br/2020/08/20/como-adicionar-meus-proprios-documentos-para-que-o-sistema-preencha-automaticamente-para-impressao/

Dados para criação do aluno

1. Informações Pessoais

foto
nome completo
data_de_nascimento
idade (Só exebição)
sexo
CPF
RG
certidão_de_nascimento
celular
cep
endereco_rua
endereco_numero
endereco bairro
endereco cidade
endereco estado


2. Informações dos Responsáveis
foto_responsavel
nome_do_responsavel_principal
data_de_nascimento
idade_responsavel
sexo_responsavel
CPF__responsavel
RG_responsavel
celular_responsavel
parentesco
cep_responsavel
endereco_rua_responsavel
endereco_numero_responsavel
endereco bairro_responsavel
endereco cidade_responsavel
endereco estado_responsavel

3. Informações Acadêmicas
ano_letivo
turno
status_da_matrícula
data_de_ingresso
hora_de_ingresso 
parte_do_dia

4. Informações Extras
necessidades_especiais
tipo sanguíneo
fator_rh
observacoes


___________________________________________________________________________________________
Dados para criação da turma

1. Identificação da Turma
Código da turma (ex: "9A-2025")
Nome da turma (ex: "9º Ano A")
Ano letivo
Série/ano (ex: "9º Ano", "3º Série do Ensino Médio")
Turno (Matutino, Vespertino, Noturno)

2. Informações Acadêmicas
Curso (se aplicável, ex: "Ensino Fundamental", "Ensino Médio", "Técnico em Informática")
Quantidade máxima de alunos
Lista de alunos matriculados
Lista de professores responsáveis
Sala de aula (número da sala, prédio, bloco)

3. Horários e Disciplinas
Grade horária (dias e horários das aulas)
Disciplinas vinculadas à turma
Professor(a) responsável por cada disciplina

4. Informações Extras
Coordenador responsável
Status da turma (ativa, encerrada, aguardando alunos)
Observações (ex: "Turma voltada para alunos com reforço em Matemática")

Educação Infantil:

Berçário: Faixa etária: 0 a 1 ano
Maternal: Faixa etária: 1 a 2 anos
Maternal II: Faixa etária: 2 a 3 anos
Jardim I: Faixa etária: 3 a 4 anos
Jardim II: Faixa etária: 4 a 5 anos

Para o Ensino Fundamental - Séries Iniciais, que abrange as crianças de 6 a 10 anos, a divisão é feita da seguinte maneira:

1º ano do Ensino Fundamental: Faixa etária: 6 a 7 anos
2º ano do Ensino Fundamental: Faixa etária: 7 a 8 anos
3º ano do Ensino Fundamental: Faixa etária: 8 a 9 anos
4º ano do Ensino Fundamental: Faixa etária: 9 a 10 anos
5º ano do Ensino Fundamental: Faixa etária: 10 a 11 anos

As séries finais do Ensino Fundamental correspondem do 6º ao 9º ano, atendendo crianças e adolescentes de 11 a 14 anos. A divisão das séries finais do Ensino Fundamental é a seguinte:

6º ano do Ensino Fundamental: Faixa etária: 11 a 12 anos
7º ano do Ensino Fundamental: Faixa etária: 12 a 13 anos
8º ano do Ensino Fundamental: Faixa etária: 13 a 14 anos
9º ano do Ensino Fundamental: Faixa etária: 14 a 15 anos

O Ensino Médio no Brasil abrange os três últimos anos da educação básica, geralmente atendendo jovens de 15 a 17 anos. A divisão é a seguinte:

1º ano do Ensino Médio: Faixa etária: 15 a 16 anos
2º ano do Ensino Médio: Faixa etária: 16 a 17 anos
3º ano do Ensino Médio: Faixa etária: 17 a 18 anos
___________________________________________________________________________________________
Dados para criação do professor

1. Informações Pessoais
Nome completo
Data de nascimento
CPF (ou outro documento de identificação)
RG
Endereço (Rua, Número, Bairro, Cidade, Estado, CEP)
Celular
E-mail
Foto

2. Informações Profissionais
Matrícula (ID do professor)
Formação Acadêmica (graduação, pós-graduação, mestrado, doutorado)
Área de atuação (Matemática, Física, História, etc.)
Disciplinas que leciona
Carga horária semanal
Turno de trabalho (Matutino, Vespertino, Noturno)
Data de admissão
Vínculo empregatício (CLT, temporário, estagiário, voluntário)
Salário (se aplicável)

3. Documentação
Diplomas e Certificados
Registro no Conselho de Classe (Ex: CRM, CREA, OAB, caso necessário)
Currículo
Comprovante de Residência
Carteira de Trabalho (se aplicável)

4. Acesso ao Sistema (se a escola tiver um sistema digital)
Login
Senha
Permissões no sistema

___________________________________________________________________________________________
Formulário de Matrícula
1. Dados do Aluno
📌 Informações pessoais do aluno

Nome completo: [____________________]
Data de nascimento: [📅 Seletor de data]
Sexo: ( ) Masculino ( ) Feminino ( ) Outro
CPF: [____________________] (opcional para menores de idade)
RG: [____________________] (opcional)
Certidão de nascimento: [📎 Upload do arquivo]
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: [📞 Número do aluno, se aplicável]
E-mail: [📧] (se aplicável)

2. Dados do Responsável
📌 Caso o aluno seja menor de idade

Nome do responsável: [____________________]
Parentesco: ( ) Pai ( ) Mãe ( ) Outro: [________]
CPF do responsável: [____________________]
Telefone do responsável: [📞]
E-mail do responsável: [📧]
Endereço do responsável (se diferente do aluno): [____________________]

3. Informações da Matrícula
📌 Dados acadêmicos do aluno

Ano letivo: [📅 Seletor de ano]
Série/Ano: [📂 Seletor de série] (Ex: 1º Ano, 6º Ano, 3ª Série do Ensino Médio)
Turma: [📂 Seletor de turma]
Turno: ( ) Matutino ( ) Vespertino ( ) Noturno
Modalidade: ( ) Presencial ( ) EAD ( ) Híbrido
Situação do aluno: ( ) Novo aluno ( ) Transferido ( ) Rematrícula

4. Informações Extras
📌 Dados complementares

Necessidades Especiais: ( ) Sim ( ) Não — Se sim, quais? [____________________]
Alergias ou condições médicas: [____________________]
Transporte escolar: ( ) Sim ( ) Não
Observações adicionais: [📝 Caixa de texto]

5. Informações Financeiras (se aplicável)
📌 Caso a escola seja particular

Mensalidade: [💰 Valor]
Forma de pagamento: ( ) Cartão ( ) Boleto ( ) Transferência
Bolsista: ( ) Sim ( ) Não — Se sim, percentual de desconto: [____%]

6. Envio de Documentos
📌 Uploads necessários

[📎] Cópia da Certidão de Nascimento ou RG
[📎] Comprovante de residência
[📎] Histórico escolar (se for transferência)
[📎] Foto 3x4

7. Confirmação
📌 Última etapa antes do envio
☑ Declaro que as informações fornecidas são verdadeiras e estou ciente das regras da escola.

🖊 Assinatura do responsável: [____________________]

📅 Data: [📅 Seletor de data]

🔘 [Enviar Matrícula] (Botão de envio do formulário)


DECLARAÇÃO DE BOLSISTA
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
Eu, [Nome do(a) Diretor(a) ou Responsável pela Instituição], na qualidade de [Cargo do Declarante] da [Nome da Escola], localizada no endereço acima citado, declaro para os devidos fins que o(a) aluno(a) [Nome do Aluno], portador(a) do CPF [Número do CPF do Aluno (se aplicável)], regularmente matriculado(a) na série [Série/Ano Escolar], turma [Nome da Turma], no turno [Matutino/Vespertino/Noturno], é beneficiário(a) de bolsa de estudos concedida por esta instituição.

A referida bolsa corresponde a [Percentual]% do valor total da mensalidade, sendo concedida devido [Motivo da Bolsa – Ex: mérito acadêmico, situação socioeconômica, convênio, etc.].

Esta declaração é emitida a pedido do(a) interessado(a) para os devidos fins.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE MATRÍCULA
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) aluno(a) [Nome Completo do Aluno], nascido(a) em [Data de Nascimento], portador(a) do CPF [Número do CPF] e RG [Número do RG], encontra-se REGULARMENTE MATRICULADO(A) nesta instituição no Ano Letivo de [Ano].

O(a) aluno(a) está cursando [Série/Ano Escolar], na turma [Nome da Turma], no turno [Matutino/Vespertino/Noturno].

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE VÍNCULO EMPREGATÍCIO Professor
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) Sr(a). [Nome Completo do Professor], portador(a) do CPF [Número do CPF] e RG [Número do RG], está vinculado(a) como professor(a) desta instituição, exercendo a função de [Cargo/Função, ex: Professor de Matemática].

O referido profissional iniciou suas atividades nesta instituição em [Data de Admissão], atuando no [Ensino Fundamental/Ensino Médio/Cursos Técnicos], ministrando as disciplinas de [Disciplinas Lecionadas], com carga horária semanal de [Número de Horas] horas.

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola


DECLARAÇÃO DE VÍNCULO EMPREGATÍCIO funcionario
Nome da Escola
CNPJ: XX.XXX.XXX/XXXX-XX
Endereço: [Rua, Número, Bairro, Cidade, Estado, CEP]
Telefone: (XX) XXXX-XXXX | E-mail: contato@escola.com

DECLARAÇÃO
A [Nome da Escola], instituição de ensino regularmente estabelecida no endereço acima, DECLARA, para os devidos fins, que o(a) Sr(a). [Nome Completo do Funcionário], portador(a) do CPF [Número do CPF] e RG [Número do RG], é funcionário(a) desta instituição, exercendo a função de [Cargo/Função] desde [Data de Admissão].

O(a) referido(a) funcionário(a) exerce suas atividades no setor de [Nome do Setor], com [número de horas semanais] de carga horária semanal, no turno [Matutino/Vespertino/Noturno], sendo responsável pelas funções de [Principais Responsabilidades].

Esta declaração é emitida a pedido do(a) interessado(a) para os fins que se fizerem necessários.

Cidade, [Data Completa]

________________________________________
[Nome do Diretor(a) ou Responsável]
Cargo: [Diretor(a)/Coordenador(a)/Outro]
Nome da Escola



Dados para criação do funcionário

1. Informações Pessoais
Nome completo
Data de nascimento
CPF
RG
Endereço (Rua, Número, Bairro, Cidade, Estado, CEP)
Telefone
E-mail
Foto
2. Informações Profissionais
Matrícula (ID do funcionário)
Cargo/Função (ex: Secretário, Coordenador, Auxiliar de Serviços Gerais, TI, etc.)
Setor (Administração, Manutenção, Secretaria, Biblioteca)
Data de admissão
Vínculo empregatício (CLT, temporário, estagiário, voluntário)
Salário (se aplicável)
Carga horária semanal
Turno de trabalho (Matutino, Vespertino, Noturno)
Supervisor ou gestor responsável
3. Documentação
Carteira de Trabalho (se aplicável)
Diplomas e Certificados (se necessário para o cargo)
Currículo
Comprovante de Residência
4. Acesso ao Sistema (se houver um sistema interno)
Login
Senha
Permissões no sistema

OUTROS

1. Equipe Administrativa
Diretor(a) – Responsável geral pela gestão da escola.
Vice-diretor(a) – Auxilia na administração e substitui o diretor quando necessário.
Coordenador(a) Pedagógico(a) – Supervisiona o ensino e apoia os professores.
Secretário(a) Escolar – Cuida da documentação dos alunos e da burocracia.
Inspetor(a) Escolar – Garante a disciplina dos alunos nos intervalos e corredores.
2. Corpo Docente
Professor(a) – Ensina as disciplinas regulares.
Professor(a) de Educação Especial – Dá suporte a alunos com necessidades especiais.
Monitor(a) / Auxiliar de Classe – Auxilia os professores em atividades específicas.
3. Apoio Operacional
Porteiro(a) – Controla a entrada e saída de alunos e visitantes.
Zelador(a) / Auxiliar de Limpeza – Mantém a escola limpa e organizada.
Merendeiro(a) – Prepara e serve a alimentação dos alunos.
Auxiliar de Manutenção – Faz reparos na estrutura da escola.
4. Tecnologia e Comunicação
Técnico de TI – Dá suporte técnico para computadores e internet.
Designer Gráfico / Marketing – Cuida da identidade visual e redes sociais da escola.
5. Serviços Extras
Psicólogo(a) Escolar – Ajuda no desenvolvimento emocional dos alunos.
Assistente Social – Atua em questões socioeconômicas dos estudantes.
Fonoaudiólogo(a) – Ajuda alunos com dificuldades na fala e audição.


// Exibe os dados validados
    var_dump($validated);
    die(); // Isso vai interromper a execução para você ver os resulta


Solução para o xampp
https://www.youtube.com/watch?v=DJRAqfGHgps


