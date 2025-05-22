- [VOLTAR](documentatian.md)
# 📚 Planejamento de Sistema Multiescolar

## 📌 Sumário
1. [Objetivo](#objetivo)
2. [Perfis de Usuário](#perfis-de-usuário)
3. [Funcionalidades por Perfil](#funcionalidades-por-perfil)
4. [Modelagem do Banco de Dados](#modelagem-do-banco-de-dados)
5. [MVP - Produto Mínimo Viável](#mvp---produto-mínimo-viável)
6. [Tecnologias Sugeridas](#tecnologias-sugeridas)
7. [Diagrama ER (Mermaid)](#diagrama-er-mermaid)

---

## 🎯 Objetivo

Criar um sistema multiescolar escalável, com suporte a múltiplas escolas, onde cada escola possui gestão própria de usuários, turmas, disciplinas, alunos, avaliações e relatórios.

---

## 👥 Perfis de Usuário

| Perfil           | Descrição |
|------------------|-----------|
| Admin Global     | Controle total do sistema e das escolas cadastradas |
| Gestor Escolar   | Administração da escola específica (turmas, professores, alunos, calendário) |
| Coordenação      | Acompanhamento pedagógico e desempenho dos alunos |
| Secretaria       | Gestão de matrículas, documentos e registros acadêmicos |
| Professor        | Gestão das aulas, lançamentos de notas e presenças |
| Aluno            | Acompanhamento de notas, faltas, horários e conteúdos |
| Responsável      | Acesso ao boletim e frequência dos filhos |

---

## � Funcionalidades por Perfil

### Admin Global
- Login seguro
- Cadastro de escolas
- Cadastro de gestores escolares
- Acesso a dados globais
- Estatísticas do sistema

### Gestor Escolar
- Cadastro de professores, alunos, turmas e disciplinas
- Gerenciamento de calendário escolar
- Emissão de relatórios
- Comunicação com pais e professores

### Coordenação
- Acompanhamento do desempenho por turma/disciplina
- Análise de indicadores pedagógicos
- Planejamento de recuperação paralela
- Comunicação com professores

### Secretaria
- Matrícula/rematrícula de alunos
- Emissão de documentos acadêmicos
- Controle de transferências
- Registro de histórico escolar

### Professor
- Visualização de turmas e disciplinas
- Lançamento de notas e frequência
- Upload de materiais e conteúdos das aulas

### Aluno
- Consulta de notas e boletins
- Frequência e horários
- Conteúdos e arquivos de aulas

### Responsável
- Visualização do desempenho dos filhos
- Frequência e boletins

---

## 🧱 Modelagem do Banco de Dados (Entidades Principais)

```plaintext
escolas
  - id, nome, cnpj, endereço, telefone, email

usuarios
  - id, nome, email, senha_hash, tipo (admin, gestor, coordenação, secretaria, professor, aluno, responsável), escola_id

turmas
  - id, nome, ano_letivo, escola_id, coordenador_id

disciplinas
  - id, nome, turma_id, professor_id

alunos
  - id, usuario_id, turma_id, responsavel_id, matricula, status (ativo/inativo)

avaliacoes
  - id, disciplina_id, titulo, data, tipo

notas
  - id, avaliacao_id, aluno_id, nota

frequencias
  - id, aula_id, aluno_id, presente (bool)

aulas
  - id, data, disciplina_id, conteudo

documentos
  - id, aluno_id, tipo (historico, declaração, etc), arquivo_path, data_emissao

requerimentos
  - id, aluno_id, tipo, status, data_solicitacao, data_conclusao