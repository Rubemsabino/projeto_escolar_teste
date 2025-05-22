- [VOLTAR](../projeto.md)  
# 📅 Tabela `professores` - Modelo Multiescolar

Armazena informações sobre os professores da instituição, com suporte para múltiplas escolas, turmas e disciplinas.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação ao nível de ensino (opcional) | `2` (Fundamental I)   | ✅           |
| `modalidade_ensino` | enum         | Modalidade de ensino (presencial, remoto, híbrido) | `presencial` | ✅           |
| `nome`              | string (100)  | Nome completo do professor               | `"Maria Oliveira"`    | ✅           |
| `cpf`               | string (14)   | CPF do professor                         | `"123.456.789-00"`    | ✅           |
| `email`             | string (100)  | E-mail de contato do professor           | `"maria.oliveira@email.com"` | ✅       |
| `telefone`          | string (15)   | Número de telefone do professor          | `"(11) 98765-4321"`   | ❌           |
| `endereco`          | string (200)  | Endereço do professor                    | `"Rua das Acácias, 456"` | ❌         |
| `data_nascimento`   | date          | Data de nascimento do professor          | `1985-04-20`          | ✅           |
| `formacao`          | string (200)  | Formação acadêmica do professor          | `"Licenciatura em Matemática"` | ✅    |
| `disciplinas`       | text          | Disciplinas que o professor leciona      | `"Matemática, Física"` | ✅           |
| `is_ativo`          | boolean       | Indica se o professor está ativo         | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro              | `2024-01-10 08:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização               | `2024-02-10 12:30:00` | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (1:N) – Cada professor pertence a uma escola específica.
- **Pertence a** `niveis_ensino` (N:1) – O professor pode lecionar para diferentes níveis de ensino, como "Fundamental I", "Fundamental II" ou "Médio".
- **Tem muitas** `disciplinas` (Disciplinas que o professor leciona em diferentes turmas e níveis de ensino).
- **Tem muitas** `turmas` (Turmas em que o professor leciona diferentes disciplinas, podendo ser em modalidades de ensino presencial ou remoto).
- **Tem muitas** `historico_professor` (Registros de avaliação de desempenho do professor ao longo do tempo).

---

## 📝 Exemplo de Dados

```sql
INSERT INTO professores 
(escola_id, nivel_ensino_id, modalidade_ensino, nome, cpf, email, telefone, endereco, data_nascimento, formacao, disciplinas, is_ativo) 
VALUES 
(1, 2, 'presencial', 'Maria Oliveira', '123.456.789-00', 'maria.oliveira@email.com', '(11) 98765-4321', 'Rua das Acácias, 456', '1985-04-20', 'Licenciatura em Matemática', 'Matemática, Física', true);
