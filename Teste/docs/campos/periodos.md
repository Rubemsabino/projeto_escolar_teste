- [VOLTAR](../projeto.md)  
# 📅 Tabela `periodos` - Modelo Multiescolar

Armazena os períodos acadêmicos (bimestres/trimestres/semestres) vinculados a um ano letivo, sendo aplicável a múltiplas escolas e permitindo um controle detalhado por tipo de período.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `ano_letivo_id`     | foreignId    | Vinculação à tabela `anos_letivos`      | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`            | `1`                   | ✅           |
| `nome`              | string (30)  | Identificação do período                | `"1º Bimestre"`       | ✅           |
| `tipo`              | enum         | Tipo de período (bimestre/trimestre/semestre) | `"bimestre"`      | ✅           |
| `data_inicio`       | date         | Início do período                       | `2024-02-05`          | ✅           |
| `data_fim`          | date         | Término do período                      | `2024-04-12`          | ✅           |
| `ordem`             | integer      | Sequência lógica do período (1, 2, 3...)| `1`                   | ✅           |
| `is_ativo`          | boolean      | Se o período está em vigor             | `true`                | ✅           |
| `descricao`         | text         | Descrição detalhada do período          | `"Período de estudos focados em matemática e ciências."` | ❌           |
| `observacoes`       | text         | Observações adicionais sobre o período  | `"Pausa para festividades no final do mês de abril."`  | ❌           |
| `informacoes_adicionais` | text     | Informações extras para o período      | `"Encontros online para recuperação."` | ❌           |
| `created_at`        | timestamp    | Data de criação                         | `2023-11-20 08:00:00` | ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-01-10 14:30:00` | ✅           |

---

## 🔗 Relacionamentos
- **Pertence a** `anos_letivos` (N:1) – Cada período está vinculado a um ano letivo específico.
- **Pertence a** `escola` (N:1) – Cada período pertence a uma escola.
- **Tem muitos** `avaliacoes` – O período pode ter várias avaliações associadas.
- **Tem muitos** `boletins` – O período pode ter boletins gerados durante seu curso.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO periodos 
(ano_letivo_id, escola_id, nome, tipo, data_inicio, data_fim, ordem, is_ativo, descricao, observacoes, informacoes_adicionais) 
VALUES 
(1, 1, '1º Bimestre', 'bimestre', '2024-02-05', '2024-04-12', 1, true, 'Período de estudos focados em matemática e ciências.', 'Pausa para festividades no final de abril.', 'Encontros online para recuperação.');
