- [VOLTAR](../projeto.md)  
# 📚 Tabela `series` - Modelo Multiescolar

Armazena as séries acadêmicas vinculadas aos níveis de ensino (ex: "1º Ano Fundamental I", "3ª Série EM"), permitindo que o sistema suporte a organização detalhada de todas as séries em cada nível de ensino.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação ao nível de ensino (`niveis_ensino`) | `2` (Fundamental I)  | ✅           |
| `nome`              | string (50)  | Nome completo da série                  | `"1º Ano"`           | ✅           |
| `nome_curto`        | string (10)  | Abreviação da série                     | `"1º"`               | ❌           |
| `ordem`             | integer      | Ordem sequencial da série (1, 2, 3...)  | `1`                  | ✅           |
| `idade_recomendada` | integer      | Idade típica de ingresso na série       | `6`                  | ❌           |
| `carga_horaria`     | integer      | Carga horária anual obrigatória (em horas) | `800`               | ❌           |
| `is_ativa`          | boolean      | Se a série está ativa                   | `true`               | ✅           |
| `descricao`         | text         | Descrição detalhada da série            | `"Série destinada ao primeiro ano do Ensino Fundamental."` | ❌           |
| `observacoes`       | text         | Observações adicionais sobre a série    | `"Inclui reforço pedagógico nas áreas de matemática e português."` | ❌           |
| `created_at`        | timestamp    | Data de criação do registro             | `2024-01-15 10:00:00`| ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-03-20 15:30:00`| ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `niveis_ensino` (N:1) – Cada série está vinculada a um nível de ensino específico.
- **Tem muitos** `turmas` (N:1) – Cada série pode ter várias turmas associadas.
- **Tem muitos** `disciplinas` (via tabela pivô `serie_disciplina`) – Cada série pode ter várias disciplinas, que são associadas por meio de uma tabela intermediária.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO series 
(nivel_ensino_id, nome, nome_curto, ordem, idade_recomendada, carga_horaria, is_ativa, descricao, observacoes) 
VALUES 
(2, '1º Ano', '1º', 1, 6, 800, true, 'Série destinada ao primeiro ano do Ensino Fundamental.', 'Inclui reforço pedagógico nas áreas de matemática e português.'),
(2, '2º Ano', '2º', 2, 7, 800, true, 'Série destinada ao segundo ano do Ensino Fundamental.', 'Reforço pedagógico disponível para alunos com dificuldades em ciências.');
