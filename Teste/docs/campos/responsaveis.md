- [VOLTAR](../projeto.md)  
# 📅 Tabela `responsaveis` - Modelo Multiescolar

Armazena informações sobre os responsáveis dos alunos, com suporte para múltiplos alunos, escolas e níveis de ensino.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId     | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nome`              | string (100)  | Nome completo do responsável             | `"Maria Souza"`       | ✅           |
| `parentesco`        | string (50)   | Parentesco com o aluno                   | `"Mãe"`               | ✅           |
| `cpf`               | string (14)   | CPF do responsável                       | `"987.654.321-00"`    | ✅           |
| `foto`              | string (255)  | Caminho ou URL da foto do responsável    | `"https://example.com/foto.jpg"` | ❌     |
| `email`             | string (100)  | E-mail de contato do responsável         | `"maria.souza@email.com"` | ❌         |
| `telefone`          | string (15)   | Número de telefone do responsável        | `"(11) 99876-5432"`   | ❌           |
| `endereco`          | string (200)  | Endereço do responsável                  | `"Avenida Central, 456"` | ❌         |
| `is_ativo`          | boolean       | Indica se o responsável está ativo       | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro              | `2023-04-01 09:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização              | `2024-02-15 16:00:00` | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (1:N) – Cada responsável pertence a uma escola específica.
- **Tem muitos** `alunos` (Relacionamento com a tabela de `alunos`, pois um responsável pode ter vários filhos matriculados em diferentes turmas e níveis de ensino).
- **Tem muitos** `matriculas` (Relacionamento com a tabela `matriculas` para gerenciar as matrículas dos alunos no sistema).

---

## 📝 Exemplo de Dados

```sql
INSERT INTO responsaveis 
(escola_id, nome, parentesco, cpf, foto, email, telefone, endereco, is_ativo) 
VALUES 
(1, 'Maria Souza', 'Mãe', '987.654.321-00', 'https://example.com/foto.jpg', 'maria.souza@email.com', '(11) 99876-5432', 'Avenida Central, 456', true);
