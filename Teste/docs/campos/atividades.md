- [VOLTAR](../projeto.md)  
# 📅 Tabela `atividades` - Modelo Multiescolar

Armazena informações sobre as atividades realizadas nas aulas, como provas, trabalhos, projetos, etc., com vínculo a escolas específicas, turmas e aulas.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                     | Exemplo                           | Obrigatório? |
|---------------------|--------------|-----------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                               | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                  | `1`                               | ✅           |
| `aula_id`           | foreignId     | Vinculação à tabela `aulas`                   | `1`                               | ✅           |
| `descricao`         | string (255)  | Descrição da atividade                        | `"Prova de Matemática"`           | ✅           |
| `tipo`              | string (50)   | Tipo da atividade (ex: "Prova", "Trabalho")   | `"Prova"`                         | ✅           |
| `data_entrega`      | date          | Data limite para entrega da atividade        | `2023-04-15`                      | ✅           |
| `nota_maxima`       | decimal (5,2) | Nota máxima atribuída à atividade             | `10.00`                           | ✅           |
| `is_ativo`          | boolean       | Indica se a atividade está ativa              | `true`                            | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                   | `2023-04-01 08:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                    | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – A atividade está vinculada a uma escola específica, permitindo o gerenciamento de atividades de diferentes escolas.
- **Pertence a** `aula` (N:1) – A atividade está associada a uma aula específica, facilitando o controle de atividades por aula.
- **Pode ter muitos** `alunos_atividade` (relacionando os alunos às atividades, com notas e status de entrega).

---

## 📝 Exemplo de Dados

```sql
INSERT INTO atividades 
(escola_id, aula_id, descricao, tipo, data_entrega, nota_maxima, is_ativo) 
VALUES 
(1, 1, 'Prova de Matemática', 'Prova', '2023-04-15', 10.00, true);
