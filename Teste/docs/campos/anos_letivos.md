- [VOLTAR](../projeto.md)  
# 📅 Tabela `anos_letivos` - Modelo Multiescolar

Armazena os anos letivos da instituição, permitindo o gerenciamento de períodos acadêmicos e turmas de diversas escolas em um sistema multiescolar.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`            | `1`                   | ✅           |
| `nome`              | string (20)  | Identificação do ano letivo (ex: "2024") | `"2024"`              | ✅           |
| `data_inicio`       | date         | Início do ano letivo                    | `2024-02-05`          | ✅           |
| `data_fim`          | date         | Término do ano letivo                   | `2024-12-15`          | ✅           |
| `is_ativo`          | boolean      | Ano letivo atual em vigor               | `true`                | ✅           |
| `max_faltas`        | integer      | Limite de faltas permitidas (dias)      | `60`                  | ❌           |
| `observacoes`       | text         | Informações adicionais sobre o ano letivo | `"Recesso em julho"`  | ❌           |
| `descricao`         | text         | Descrição adicional do ano letivo       | `"Ano letivo com foco no desenvolvimento das habilidades."` | ❌           |
| `modalidade`        | enum         | Modalidade de ensino (presencial, remoto, híbrido) | `"presencial"` | ❌           |
| `tipo_ensino`       | enum         | Tipo de ensino (fundamental, médio, superior) | `"fundamental"`    | ❌           |
| `observacoes_especial` | text      | Observações sobre características especiais do ano letivo | `"Ano com muitos projetos interdisciplinares"` | ❌           |
| `created_at`        | timestamp    | Data de criação do registro             | `2023-11-20 08:00:00` | ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-01-10 14:30:00` | ✅           |

---

## 🔗 Relacionamentos
- **Pertence a** `escola` (1:N) – Cada ano letivo está vinculado a uma escola.
- **Tem muitos** `periodos` (bimestres/trimestres/semestres) – Define os períodos acadêmicos (ex: bimestres).
- **Tem muitos** `turmas` – Cada ano letivo pode ter várias turmas associadas a ele.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO anos_letivos 
(escola_id, nome, data_inicio, data_fim, is_ativo, max_faltas, observacoes, descricao, modalidade, tipo_ensino, observacoes_especial) 
VALUES 
(1, '2024', '2024-02-05', '2024-12-15', true, 60, 'Recesso em julho', 'Ano letivo com foco no desenvolvimento das habilidades.', 'presencial', 'fundamental', 'Ano com muitos projetos interdisciplinares');
