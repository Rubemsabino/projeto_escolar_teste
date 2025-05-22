- [VOLTAR](../projeto.md)  
# 📅 Tabela `matriculas` - Modelo Multiescolar

Armazena as informações detalhadas sobre as matrículas dos alunos, associando-os a turmas, séries, anos letivos e oferecendo maior flexibilidade para a gestão escolar.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`            | `1`                   | ✅           |
| `serie_id`          | foreignId     | Vinculação à tabela `series`            | `5`                   | ✅           |
| `turma_id`          | foreignId     | Vinculação à tabela `turmas`            | `3`                   | ✅           |
| `ano_letivo_id`     | foreignId     | Vinculação à tabela `anos_letivos`      | `2024`                | ✅           |
| `data_matricula`    | date          | Data de matrícula                        | `2024-02-05`          | ✅           |
| `status`            | string (20)   | Status da matrícula (ex: 'ativa', 'cancelada', 'trancada') | `"ativa"` | ✅           |
| `observacoes`       | text          | Observações sobre a matrícula            | `"Matrícula regular"` | ❌           |
| `is_transferido`    | boolean       | Indica se o aluno foi transferido de outra escola | `false`               | ❌           |
| `data_transferencia`| date          | Data da transferência (se aplicável)     | `2024-03-10`          | ❌           |
| `motivo_transferencia`| string (255) | Motivo da transferência (se aplicável)   | `"Mudança de cidade"` | ❌           |
| `is_reserva`        | boolean       | Indica se a matrícula é de reserva (ex: lista de espera) | `false`               | ❌           |
| `created_at`        | timestamp     | Data de criação do registro             | `2024-02-05 08:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização              | `2024-02-10 12:30:00` | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `alunos` (N:1) – Cada matrícula está associada a um aluno específico.
- **Pertence a** `series` (N:1) – Cada matrícula está vinculada a uma série específica, representando o ano escolar do aluno dentro de um nível de ensino.
- **Pertence a** `turmas` (N:1) – A matrícula refere-se a uma turma específica.
- **Pertence a** `anos_letivos` (N:1) – Cada matrícula está vinculada a um ano letivo específico.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO matriculas 
(aluno_id, serie_id, turma_id, ano_letivo_id, data_matricula, status, observacoes, is_transferido) 
VALUES 
(1, 5, 3, 2024, '2024-02-05', 'ativa', 'Matrícula regular', false),
(2, 4, 6, 2024, '2024-03-10', 'ativa', 'Aluno transferido de outra escola', true);
