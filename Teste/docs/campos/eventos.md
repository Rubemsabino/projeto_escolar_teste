- [VOLTAR](../projeto.md)  
# 📅 Tabela `eventos`

Armazena informações sobre eventos organizados pela instituição, como palestras, encontros, seminários, etc.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `titulo`            | string (255)  | Título do evento                         | `"Seminário de Matemática"` | ✅           |
| `descricao`         | text          | Descrição detalhada do evento            | `"Seminário sobre técnicas avançadas em Matemática."` | ✅           |
| `data_inicio`       | timestamp     | Data e hora de início do evento          | `2023-05-10 09:00:00` | ✅           |
| `data_fim`          | timestamp     | Data e hora de término do evento         | `2023-05-10 12:00:00` | ✅           |
| `local`             | string (100)  | Local onde o evento ocorrerá             | `"Auditório Principal"` | ✅           |
| `is_ativo`          | boolean       | Indica se o evento está ativo            | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro              | `2023-04-01 08:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização               | `2024-02-15 16:00:00` | ✅           |

---

## 🔗 Relacionamentos
- **Pode ser associado a** `alunos`, `professores`, `responsaveis` (Evento pode envolver qualquer parte da comunidade escolar)

---

## 📝 Exemplo de Dados
```sql
INSERT INTO eventos 
(titulo, descricao, data_inicio, data_fim, local, is_ativo) 
VALUES 
('Seminário de Matemática', 'Seminário sobre técnicas avançadas em Matemática.', '2023-05-10 09:00:00', '2023-05-10 12:00:00', 'Auditório Principal', true);
```
- [VOLTAR](../projeto.md)  
