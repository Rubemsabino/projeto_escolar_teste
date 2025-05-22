- [VOLTAR](../projeto.md)  
# 📅 Tabela `planejamentos_anual` - Modelo Multiescolar

Armazena os planejamentos anuais de ensino da instituição, permitindo o controle e a organização dos conteúdos a serem abordados ao longo do ano, com uma estrutura flexível para atender a diferentes níveis de ensino e áreas de conhecimento.

## 📌 Campos Principais

| Campo               | Tipo         | Descrição                                | Exemplo               | Obrigatório? |
|---------------------|--------------|------------------------------------------|-----------------------|--------------|
| `id`                | bigIncrements | Chave primária                          | `1`                   | ✅           |
| `escola_id`         | foreignId    | Vinculação à tabela `escola`             | `1`                   | ✅           |
| `nivel_ensino_id`   | foreignId    | Vinculação ao nível de ensino (opcional) | `2` (Fundamental I)   | ❌           |
| `area_id`           | foreignId    | Vinculação à área de conhecimento (opcional) | `3` (Matemática)    | ❌           |
| `ano_letivo_id`     | foreignId    | Vinculação ao ano letivo (tabela `anos_letivos`) | `2024`             | ✅           |
| `disciplina_id`     | foreignId    | Vinculação à tabela `disciplinas`       | `2` (Matemática)      | ✅           |
| `conteudo`          | text         | Conteúdo programático do ano            | `"Geometria, Álgebra e Funções"` | ✅    |
| `objetivos`         | text         | Objetivos de aprendizagem para o ano    | `"Desenvolver habilidades em resolução de problemas matemáticos"` | ✅ |
| `avaliacoes`        | text         | Descrição das avaliações a serem aplicadas | `"Provas bimestrais e atividades práticas"` | ✅ |
| `metodologia`       | text         | Metodologias a serem utilizadas         | `"Métodos ativos, aprendizado baseado em projetos"` | ✅ |
| `responsavel`       | string (100) | Responsável pelo planejamento           | `"Prof. Maria Oliveira"` | ✅           |
| `is_ativo`          | boolean      | Se o planejamento está ativo ou concluído | `true`               | ✅           |
| `created_at`        | timestamp    | Data de criação do registro             | `2024-01-05 08:00:00`  | ✅           |
| `updated_at`        | timestamp    | Data da última atualização              | `2024-01-10 14:30:00`  | ✅           |

---

## 🔗 Relacionamentos

- **Pertence a** `escola` (1:N) – O planejamento pertence a uma escola específica.
- **Pertence a** `niveis_ensino` (N:1) – O planejamento pode ser associado a um nível de ensino, como Infantil, Fundamental I, II ou Médio.
- **Pertence a** `areas` (N:1) – O planejamento pode estar vinculado a uma área do conhecimento, como Matemática, Ciências ou Língua Portuguesa.
- **Pertence a** `anos_letivos` (N:1) – O planejamento é associado a um ano letivo específico.
- **Pertence a** `disciplinas` (N:1) – Cada planejamento corresponde a uma disciplina específica.
- **Tem muitos** `atividades` (N:M) – O planejamento pode ter várias atividades associadas a ele, com cada atividade relacionada ao conteúdo, avaliação ou objetivo.

---

## 📝 Exemplo de Dados

```sql
INSERT INTO planejamentos_anual 
(escola_id, nivel_ensino_id, area_id, ano_letivo_id, disciplina_id, conteudo, objetivos, avaliacoes, metodologia, responsavel) 
VALUES 
(1, 2, 3, 2024, 2, 'Geometria, Álgebra e Funções', 'Desenvolver habilidades em resolução de problemas matemáticos', 'Provas bimestrais e atividades práticas', 'Métodos ativos, aprendizado baseado em projetos', 'Prof. Maria Oliveira');
