- [VOLTAR](../projeto.md)  
# 📖 Tabela `disciplinas` - Modelo Multiescolar

Armazena as disciplinas/matérias oferecidas pela instituição, com configurações detalhadas por nível de ensino e vinculação à BNCC (Base Nacional Comum Curricular).

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nome`              | string (100) | Nome completo da disciplina              | `"Matemática"`        | ✅           |
| `nome_curto`        | string (20)  | Sigla ou abreviação da disciplina        | `"MAT"`               | ❌           |
| `carga_horaria`     | integer      | Total de horas anuais da disciplina      | `160`                 | ✅           |
| `etapa`             | enum         | Nível de ensino aplicável               | `"fundamental_ii"`    | ✅           |
| `tipo`              | enum         | Classificação da disciplina (base, optativa) | `"base"`            | ✅           |
| `bncc_codigos`      | json         | Códigos das habilidades da BNCC vinculadas| `["EF01MA01"]`        | ❌           |
| `is_ativa`          | boolean      | Se a disciplina está ativa ou desativada | `true`                | ✅           |
| `created_at`        | timestamp    | Data de criação                         | `2024-01-15 10:00:00`| ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-03-20 15:30:00`| ✅           |

---

### Valores para `etapa`:
```php
[
    'infantil',
    'fundamental_i',
    'fundamental_ii',
    'medio',
    'eja'
]
