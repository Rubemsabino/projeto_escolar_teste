- [VOLTAR](../projeto.md)  
# 🎓 Tabela `niveis_ensino` - Modelo Multiescolar

Define os níveis de ensino oferecidos pela instituição (Infantil, Fundamental I/II, Médio, etc.), permitindo que o sistema suporte diferentes escolas com variações nos níveis e modalidades de ensino.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`            | `1`                   | ✅           |
| `nome`              | string (50)  | Nome do nível de ensino                  | `"Fundamental I"`     | ✅           |
| `codigo`            | string (10)  | Código único (padrão MEC/INEP)           | `"EF01"`              | ❌           |
| `etapa`             | enum         | Classificação principal do nível de ensino | `"fundamental"`      | ✅           |
| `idade_minima`      | integer      | Idade mínima recomendada para ingresso  | `6`                   | ❌           |
| `idade_maxima`      | integer      | Idade máxima recomendada para o nível   | `10`                  | ❌           |
| `carga_horaria_anual`| integer     | Número de horas anuais obrigatórias     | `800`                 | ❌           |
| `is_ativo`          | boolean      | Se o nível de ensino está ativo         | `true`                | ✅           |
| `descricao`         | text         | Descrição detalhada do nível de ensino  | `"Ensino fundamental com foco em alfabetização e desenvolvimento cognitivo."` | ❌           |
| `observacoes`       | text         | Observações adicionais sobre o nível    | `"Reforço pedagógico disponível."` | ❌           |
| `created_at`        | timestamp    | Data de criação                         | `2024-01-15 10:00:00`| ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-03-20 15:30:00`| ✅           |

### Valores para `etapa`:

```php
[
    'infantil',       // Educação Infantil
    'fundamental_i',  // Ensino Fundamental I
    'fundamental_ii', // Ensino Fundamental II
    'medio',          // Ensino Médio
    'eja'             // Educação de Jovens e Adultos
]
