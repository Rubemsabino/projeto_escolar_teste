- [VOLTAR](../projeto.md)  
# 📅 Tabela `boletins`

Armazena as informações dos boletins dos alunos, com as notas e o desempenho nas atividades escolares.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `aluno_id`          | foreignId     | Vinculação à tabela `alunos`            | `1`                   | ✅           |
| `periodo`           | string (20)   | Período escolar (ex: "1º Semestre 2023") | `"1º Semestre 2023"`  | ✅           |
| `nota_final`        | decimal (5,2) | Nota final do aluno no período           | `8.50`                | ✅           |
| `comentarios`       | text          | Comentários gerais sobre o desempenho    | `"Bom desempenho geral, mas pode melhorar em algumas áreas."` | ❌           |
| `is_ativo`          | boolean       | Indica se o boletim está ativo           | `true`                | ✅           |
| `created_at`        | timestamp     | Data de criação do registro              | `2023-07-15 08:00:00` | ✅           |
| `updated_at`        | timestamp     | Data da última atualização               | `2024-02-15 16:00:00` | ✅           |

---

## 🔗 Relacionamentos
- **Pertence a** `aluno` (N:1)

---

## 📝 Exemplo de Dados
```sql
INSERT INTO boletins 
(aluno_id, periodo, nota_final, comentarios, is_ativo) 
VALUES 
(1, '1º Semestre 2023', 8.50, 'Bom desempenho geral, mas pode melhorar em algumas áreas.', true);
```
- [VOLTAR](../projeto.md)  
