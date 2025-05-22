- [VOLTAR](../projeto.md)  
# 📅 Tabela `reunioes_pedagogicas` - Modelo Multiescolar

Armazena informações sobre reuniões pedagógicas da instituição, permitindo o gerenciamento de eventos e discussões acadêmicas em uma escola multiescolar.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação ao nível de ensino (opcional) | `2` (Fundamental I)   | ❌           |
| `area_id`           | foreignId    | Vinculação à área de conhecimento (opcional) | `3` (Matemática)    | ❌           |
| `data_reuniao`      | date         | Data da reunião pedagógica              | `2025-04-10`          | ✅           |
| `hora_inicio`       | time         | Hora de início da reunião                | `14:00:00`            | ✅           |
| `hora_fim`          | time         | Hora de término da reunião               | `16:00:00`            | ✅           |
| `tema`              | string (100) | Tema principal da reunião                | `"Planejamento de Ensino"` | ✅       |
| `responsavel`       | string (50)  | Responsável pela reunião                 | `"João Silva"`        | ✅           |
| `observacoes`       | text         | Observações adicionais                   | `"Revisão do plano do semestre"` | ❌  |
| `is_ativa`          | boolean      | Se a reunião está ativa ou concluída     | `true`                | ✅           |
| `created_at`        | timestamp    | Data de criação do registro              | `2025-04-01 08:00:00` | ✅           |
| `updated_at`        | timestamp    | Data da última atualização               | `2025-04-05 12:30:00` | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (1:N) – A reunião pertence a uma escola específica.
- **Pertence a** `niveis_ensino` (N:1) – A reunião pode ser vinculada a um nível específico de ensino, como Infantil, Fundamental I, II, ou Médio.
- **Pertence a** `areas` (N:1) – A reunião pode ser vinculada a uma área de conhecimento, como Matemática ou Língua Portuguesa.
- **Tem muitos** `participantes` (Professores, Coordenadores, etc.) – A reunião tem participantes, que podem incluir professores, coordenadores, entre outros membros da escola.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO reunioes_pedagogicas 
(escola_id, nivel_ensino_id, area_id, data_reuniao, hora_inicio, hora_fim, tema, responsavel) 
VALUES 
(1, 2, 3, '2025-04-10', '14:00:00', '16:00:00', 'Planejamento de Ensino', 'João Silva'),
(1, 4, null, '2025-04-11', '10:00:00', '12:00:00', 'Discussão sobre práticas pedagógicas', 'Maria Oliveira');
