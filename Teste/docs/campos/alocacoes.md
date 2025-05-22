- [VOLTAR](../projeto.md)  
# 👨‍🏫 Tabela `alocacoes` - Modelo Multiescolar

Gerencia a alocação de professores às disciplinas e turmas, incluindo horários específicos, informações de substituição, e o vínculo com o ano letivo.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `professor_id`      | foreignId    | Vinculação à tabela `professores`        | `15`                  | ✅           |
| `disciplina_id`     | foreignId    | Vinculação à tabela `disciplinas`        | `8` (Matemática)      | ✅           |
| `turma_id`          | foreignId    | Vinculação à tabela `turmas`             | `3` (Turma A)         | ✅           |
| `ano_letivo_id`     | foreignId    | Vinculação à tabela `anos_letivos`       | `2` (Ano Letivo 2024) | ✅           |
| `dia_semana`        | enum         | Dia da semana em que ocorre a aula       | `"segunda"`           | ✅           |
| `hora_inicio`       | time         | Horário de início da aula                | `"08:00:00"`          | ✅           |
| `hora_fim`          | time         | Horário de término da aula               | `"09:30:00"`          | ✅           |
| `sala_id`           | foreignId    | Vinculação a `salas` (opcional)          | `5`                   | ❌           |
| `is_substituto`     | boolean      | Indica se a alocação é temporária        | `false`               | ✅           |
| `created_at`        | timestamp    | Data de criação da alocação              | `2024-01-15 10:00:00` | ✅           |
| `updated_at`        | timestamp    | Data da última atualização               | `2024-03-20 15:30:00` | ✅           |

---

### Valores para `dia_semana`:
```php
[
    'segunda',
    'terca',
    'quarta',
    'quinta',
    'sexta',
    'sabado'
]
