- [VOLTAR](../projeto.md)  
# 📅 Tabela `aluno_responsavel` - Modelo Multiescolar

Armazena o relacionamento entre os alunos e seus responsáveis, considerando que um aluno pode ter múltiplos responsáveis e que um responsável pode estar vinculado a diferentes escolas.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                      | Exemplo                           | Obrigatório? |
|---------------------|--------------|------------------------------------------------|-----------------------------------|--------------|
| `id`                | bigIncrements | Chave primária                                | `1`                               | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`                   | `1`                               | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`                   | `1`                               | ✅           |
| `responsavel_id`    | foreignId     | Vinculação à tabela `responsavel`              | `1`                               | ✅           |
| `relacionamento`    | string (50)   | Tipo de relacionamento (ex: "Mãe", "Pai", "Responsável Legal") | `"Mãe"`                   | ✅           |
| `is_ativo`          | boolean       | Indica se o relacionamento está ativo          | `true`                            | ✅           |
| `created_at`        | timestamp     | Data de criação do registro                    | `2023-04-01 09:00:00`             | ✅           |
| `updated_at`        | timestamp     | Data da última atualização                     | `2024-02-15 16:00:00`             | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `aluno` (N:1) – Cada registro de **aluno_responsavel** está vinculado a um aluno específico.
- **Pertence a** `responsavel` (N:1) – Cada registro de **aluno_responsavel** está vinculado a um responsável específico.
- **Pertence a** `escola` (N:1) – O vínculo é específico para a escola do aluno, considerando um modelo multiescolar.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO aluno_responsavel 
(escola_id, aluno_id, responsavel_id, relacionamento, is_ativo) 
VALUES 
(1, 1, 1, 'Mãe', true);
