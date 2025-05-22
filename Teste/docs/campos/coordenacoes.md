- [VOLTAR](../projeto.md)  
# 🎓 Tabela `coordenacoes` - Modelo Multiescolar

Gerencia as coordenações pedagógicas por nível de ensino, área específica ou projeto, com informações detalhadas para uma escola multiescolar.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação à tabela `niveis_ensino` (opcional) | `2` (Fundamental I)  | ❌           |
| `area_id`           | foreignId    | Vinculação à tabela `areas` (opcional)   | `3` (Matemática)      | ❌           |
| `nome`              | string (100) | Nome da coordenação                     | `"Coord. Pedagógica"` | ✅           |
| `tipo`              | enum         | Tipo de coordenação                     | `"pedagogica"`        | ✅           |
| `user_id`           | foreignId    | Coordenador responsável                  | `45`                  | ✅           |
| `data_inicio`       | date         | Início da gestão                         | `2024-01-01`          | ✅           |
| `data_fim`          | date         | Término da gestão (opcional)             | `2024-12-31`          | ❌           |
| `is_ativo`          | boolean      | Coordenação ativa                        | `true`                | ✅           |
| `descricao`         | text         | Descrição detalhada da coordenação       | `"Coordenação do ensino de Matemática"` | ❌           |
| `is_multidisciplinar` | boolean     | Se a coordenação abrange múltiplas disciplinas | `false`            | ❌           |
| `is_multinivel`     | boolean      | Se a coordenação abrange múltiplos níveis de ensino | `true`            | ❌           |
| `created_at`        | timestamp    | Data de criação                          | `2024-01-15 10:00:00`| ✅           |
| `updated_at`        | timestamp    | Data da última atualização               | `2024-03-20 15:30:00`| ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (N:1) – Cada coordenação está vinculada a uma escola específica.
- **Pertence a** `niveis_ensino` (N:1) – Se a coordenação for por nível de ensino, ela está vinculada a um nível de ensino específico (ex: Infantil, Fundamental I, II, Médio).
- **Pertence a** `areas` (N:1) – Se a coordenação for por área de conhecimento, ela está vinculada a uma área específica (ex: Matemática, Língua Portuguesa, Ciências).
- **Pertence a** `users` (N:1) – Cada coordenação tem um coordenador responsável (usuario).
  
---

## 📝 Exemplo de Dados

```sql
INSERT INTO coordenacoes 
(escola_id, nivel_ensino_id, area_id, nome, tipo, user_id, data_inicio, is_ativo) 
VALUES 
(1, 2, 3, 'Coordenação Pedagógica do Fundamental I', 'pedagogica', 45, '2024-01-01', true),
(1, null, 4, 'Coordenação de Matemática', 'area', 46, '2024-01-01', true),
(1, 2, null, 'Coordenação do Fundamental I', 'nivel', 47, '2024-01-01', true);
