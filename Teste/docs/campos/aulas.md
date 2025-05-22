- [VOLTAR](../projeto.md)  
# 📅 Tabela `aulas` - Modelo Multiescolar (Com correção de campo)

Armazena informações detalhadas sobre as aulas ministradas nas diferentes turmas e escolas, incluindo dados como horários, locais, e disciplinas.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                      | Exemplo                           | Obrigatório? |
|---------------------|--------------|------------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                                | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                   | `1`                               | ✅           |
| `turma_id`          | foreignId     | Vinculação à tabela `turmas`                   | `1`                               | ✅           |
| `professor_id`      | foreignId     | Vinculação à tabela `professores`              | `1`                               | ✅           |
| `disciplina_id`     | foreignId     | Vinculação à tabela `disciplinas`              | `2`                               | ✅           |
| `data_aula`         | date          | Data da aula                                   | `2023-04-10`                      | ✅           |
| `hora_inicio`       | time          | Hora de início da aula                         | `08:00:00`                        | ✅           |
| `hora_fim`          | time          | Hora de término da aula                        | `09:30:00`                        | ✅           |
| `local`             | string (100)  | Local onde a aula será ministrada              | `"Sala 101"`                      | ✅           |
| `is_ativo`          | boolean       | Indica se a aula está ativa                    | `true`                            | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                    | `2023-04-01 08:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                     | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – Cada aula é associada a uma escola específica, permitindo o gerenciamento multiescolar.
- **Pertence a** `turma` (N:1) – Cada aula pertence a uma turma específica dentro da escola.
- **Pertence a** `professor` (N:1) – Cada aula é ministrada por um professor, permitindo o registro da pessoa responsável.
- **Pertence a** `disciplina` (N:1) – A aula está vinculada a uma disciplina específica, permitindo a associação com os conteúdos programáticos.
- **Tem muitos** `alunos` (M:N) – A aula pode ter vários alunos matriculados que assistem a ela.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO aulas 
(escola_id, turma_id, professor_id, disciplina_id, data_aula, hora_inicio, hora_fim, local, is_ativo) 
VALUES 
(1, 1, 1, 2, '2023-04-10', '08:00:00', '09:30:00', 'Sala 101', true);
