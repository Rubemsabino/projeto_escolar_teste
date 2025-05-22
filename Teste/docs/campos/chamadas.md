- [VOLTAR](../projeto.md)  
# 📅 Tabela `chamadas` - Modelo Multiescolar

Armazena as informações de presença dos alunos nas aulas ministradas, incluindo dados sobre justificativas de faltas e a vinculação a diferentes escolas e turmas.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                     | Exemplo                           | Obrigatório? |
|---------------------|--------------|-----------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                               | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                  | `1`                               | ✅           |
| `aula_id`           | foreignId     | Vinculação à tabela `aulas`                   | `1`                               | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`                  | `1`                               | ✅           |
| `presenca`          | boolean       | Indica se o aluno esteve presente             | `true`                            | ✅           |
| `justificativa`     | text          | Justificativa para ausência (se houver)      | `"Estava doente"`                 | ❌           |
| `data_chamada`      | timestamp     | Data e hora da chamada de presença           | `2023-04-10 08:00:00`             | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                   | `2023-04-10 08:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                    | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – A chamada está associada a uma escola específica.
- **Pertence a** `aula` (N:1) – A chamada é vinculada a uma aula específica.
- **Pertence a** `aluno` (N:1) – A chamada é vinculada a um aluno específico, registrando sua presença ou ausência.
- **Possui muitos** `justificativas` (caso o aluno forneça uma justificativa para a falta).

---

## 📝 Exemplo de Dados

```sql
INSERT INTO chamadas 
(escola_id, aula_id, aluno_id, presenca, justificativa, data_chamada) 
VALUES 
(1, 1, 1, true, null, '2023-04-10 08:00:00');
