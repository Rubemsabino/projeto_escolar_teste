- [VOLTAR](../projeto.md)  
# 📅 Tabela `notas` - Modelo Multiescolar

Armazena as notas dos alunos nas atividades realizadas, com vinculação a uma escola, atividade, aluno, disciplina e período específicos.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                         | Exemplo                           | Obrigatório? |
|---------------------|--------------|---------------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                                   | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                      | `1`                               | ✅           |
| `atividade_id`      | foreignId     | Vinculação à tabela `atividades`                  | `1`                               | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`                      | `1`                               | ✅           |
| `disciplina_id`     | foreignId     | Vinculação à tabela `disciplinas`                 | `1`                               | ✅           |
| `periodo_id`        | foreignId     | Vinculação à tabela `periodos`                    | `1`                               | ✅           |
| `nota`              | decimal (5,2) | Nota obtida pelo aluno na atividade              | `8.50`                            | ✅           |
| `comentarios`       | text          | Comentários sobre o desempenho do aluno           | `"Boa performance geral"`         | ❌           |
| `is_ativo`          | boolean       | Indica se a nota está ativa                      | `true`                            | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                       | `2023-04-10 08:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                        | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – A nota está vinculada a uma escola específica, permitindo gerenciar notas de alunos de diversas escolas.
- **Pertence a** `atividade` (N:1) – Cada nota está associada a uma atividade específica, como uma prova, trabalho ou projeto.
- **Pertence a** `aluno` (N:1) – A nota é atribuída a um aluno específico.
- **Pertence a** `disciplina` (N:1) – Cada nota está associada a uma disciplina, como "Matemática", "História", etc.
- **Pertence a** `periodo` (N:1) – A nota está vinculada a um período letivo específico, facilitando o controle de notas por semestre ou ano.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO notas 
(escola_id, atividade_id, aluno_id, disciplina_id, periodo_id, nota, comentarios, is_ativo) 
VALUES 
(1, 1, 1, 1, 1, 8.50, 'Boa performance geral', true);
