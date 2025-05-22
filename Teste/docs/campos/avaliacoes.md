- [VOLTAR](../projeto.md)  
# 📅 Tabela `avaliacoes` - Modelo Multiescolar com Período e Disciplina

Armazena as avaliações qualitativas dos alunos nas atividades realizadas, com vinculação a uma escola, atividade, aluno, disciplina e período específicos.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                         | Exemplo                           | Obrigatório? |
|---------------------|--------------|---------------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                                   | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                      | `1`                               | ✅           |
| `atividade_id`      | foreignId     | Vinculação à tabela `atividades`                  | `1`                               | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`                      | `1`                               | ✅           |
| `disciplina_id`     | foreignId     | Vinculação à tabela `disciplinas`                  | `1`                               | ✅           |
| `periodo_id`        | foreignId     | Vinculação à tabela `periodos`                    | `1`                               | ✅           |
| `comentarios`       | text          | Comentários sobre o desempenho do aluno           | `"Boa participação"`              | ✅           |
| `nota`              | decimal (5,2) | Nota numérica atribuída ao aluno (se aplicável)   | `8.50`                            | ❌           |
| `is_ativo`          | boolean       | Indica se a avaliação está ativa                  | `true`                            | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                       | `2023-04-10 08:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                        | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – A avaliação está vinculada a uma escola específica, permitindo gerenciar avaliações de diversas escolas.
- **Pertence a** `atividade` (N:1) – Cada avaliação está associada a uma atividade específica realizada.
- **Pertence a** `aluno` (N:1) – Cada avaliação é específica para um aluno, permitindo um acompanhamento individualizado.
- **Pertence a** `disciplina` (N:1) – Cada avaliação está vinculada a uma disciplina, permitindo uma organização por matérias.
- **Pertence a** `periodo` (N:1) – A avaliação é associada a um período letivo específico, permitindo o controle das avaliações por período.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO avaliacoes 
(escola_id, atividade_id, aluno_id, disciplina_id, periodo_id, comentarios, nota, is_ativo) 
VALUES 
(1, 1, 1, 1, 1, 'Boa participação', 8.50, true);
