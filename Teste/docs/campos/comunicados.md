- [VOLTAR](../projeto.md)  
# 📅 Tabela `comunicados`

Armazena os comunicados enviados para alunos, responsáveis ou professores.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `destinatario_id`   | foreignId     | Identificação do destinatário (Aluno, Responsável ou Professor) | `1`                   | ✅           |
| `tipo_destinatario` | string (50)   | Tipo de destinatário (Aluno, Responsável, Professor) | `"Aluno"`             | ✅           |
| `titulo`            | string (255)  | Título do comunicado                     | `"Reunião de Pais"`   | ✅           |
| `mensagem`          | text          | Corpo do comunicado                      | `"Favor comparecer à reunião..."` | ✅           |
| `data_envio`        | timestamp     | Data de envio do comunicado              | `2023-04-10 08:00:00` | ✅           |
| `is_ativo`          | boolean       | Indica se o comunicado está ativo        | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro              | `2023-04-01 08:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização               | `2024-02-15 16:00:00` | ✅           |

---

## 🔗 Relacionamentos
- **Pertence a** `aluno` (N:1) (Se `tipo_destinatario = 'Aluno'`)
- **Pertence a** `responsavel` (N:1) (Se `tipo_destinatario = 'Responsável'`)
- **Pertence a** `professor` (N:1) (Se `tipo_destinatario = 'Professor'`)

---

## 📝 Exemplo de Dados
```sql
INSERT INTO comunicados 
(destinatario_id, tipo_destinatario, titulo, mensagem, data_envio, is_ativo) 
VALUES 
(1, 'Aluno', 'Reunião de Pais', 'Favor comparecer à reunião de pais no dia 15/04', '2023-04-10 08:00:00', true);
```
- [VOLTAR](../projeto.md)  
