- [VOLTAR](../projeto.md)  
# 🏫 Tabela `turmas` - Modelo Multiescolar

Gerencia as turmas (divisões de séries por turno/ano letivo) da instituição, permitindo um controle detalhado das turmas em cada nível de ensino, por turno, capacidade, e professor responsável.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `serie_id`          | foreignId    | Vinculação à tabela `series`             | `5` (1º Ano Fund I)   | ✅           |
| `ano_letivo_id`     | foreignId    | Vinculação à tabela `anos_letivos`      | `3` (Ano 2024)        | ✅           |
| `nome`              | string (30)  | Nome da turma (ex: "A", "Manhã")         | `"A"`, `"Manhã"`      | ✅           |
| `turno`             | enum         | Período de funcionamento (matutino, vespertino, etc.) | `"matutino"`         | ✅           |
| `sala_id`           | foreignId    | Vinculação à tabela `salas` (opcional)   | `12`                  | ❌           |
| `capacidade_maxima` | integer      | Número máximo de alunos por turma       | `30`                  | ❌           |
| `vagas_disponiveis` | integer      | Vagas restantes na turma                | `5`                   | ❌           |
| `professor_id`      | foreignId    | Professor responsável pela turma        | `45`                  | ❌           |
| `is_ativa`          | boolean      | Se a turma está ativa ou desativada     | `true`                | ✅           |
| `created_at`        | timestamp    | Data de criação                         | `2024-01-15 10:00:00` | ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-03-20 15:30:00` | ✅           |
| `observacoes`       | text         | Observações adicionais sobre a turma    | `"Turma com projeto pedagógico especial"` | ❌ |

---

### Valores para `turno`:
```php
[
    'matutino',
    'vespertino',
    'noturno',
    'integral'
]
