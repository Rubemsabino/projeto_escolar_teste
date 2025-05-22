- [VOLTAR](../projeto.md)  
# 📅 Tabela `alunos` - Modelo Multiescolar

Armazena informações pessoais dos alunos, com um vínculo a múltiplas escolas e informações adicionais sobre seu contexto educacional.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação ao nível de ensino (opcional) | `2` (Fundamental I)   | ✅           |
| `modalidade_ensino` | enum         | Modalidade de ensino (presencial, remoto, híbrido) | `presencial`      | ✅           |
| `nome`              | string (100)  | Nome completo do aluno                   | `"João Silva"`        | ✅           |
| `data_nascimento`   | date          | Data de nascimento do aluno              | `2005-07-15`          | ✅           |
| `cpf`               | string (14)   | CPF do aluno                             | `"123.456.789-00"`    | ✅           |
| `email`             | string (100)  | E-mail de contato do aluno               | `"joao.silva@email.com"` | ❌         |
| `telefone`          | string (15)   | Número de telefone do aluno              | `"(11) 98765-4321"`   | ❌           |
| `endereco`          | string (200)  | Endereço do aluno                        | `"Rua das Flores, 123"` | ❌         |
| `is_ativo`          | boolean       | Indica se o aluno está ativo             | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro             | `2023-03-01 08:00:00`  | ✅           |
| `updated_at`        | timestamp     | Data da última atualização              | `2024-01-10 14:30:00`  | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (1:N) – Cada aluno pertence a uma escola.
- **Pertence a** `niveis_ensino` (N:1) – O aluno está associado a um nível de ensino, como Educação Infantil, Fundamental I, II ou Ensino Médio.
- **Tem muitas** `matriculas` (Matrículas realizadas pelo aluno) – O aluno pode estar matriculado em várias turmas ao longo de sua trajetória educacional.
- **Tem muitos** `historico_academico` (Histórico de notas e desempenho do aluno) – Um histórico completo do aluno ao longo de sua vida escolar.
- **Tem**
