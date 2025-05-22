- [VOLTAR](../projeto.md)  
# 📌 Tabela `escola` - Estrutura Completa para Multiescola

Tabela que armazena informações essenciais e detalhadas para todas as instituições de ensino, com uma estrutura uniforme para todas as escolas no sistema.

## 🏫 Campos Essenciais

### **Identificação**
| Campo           | Tipo         | Descrição                          | Exemplo             |
|-----------------|--------------|------------------------------------|---------------------|
| `id`            | bigIncrements | Chave primária                    | `1`                 |
| `nome`          | string (150)  | Nome completo da instituição      | `Colégio Excelência`|
| `nome_fantasia` | string (100)  | Nome abreviado/apelido da escola  | `Excelência`        |
| `codigo_inep`   | string (20)   | Código INEP (Brasil)              | `12345678`          |
| `tipo_escola`   | enum          | Tipo de escola (pública, privada) | `privada`           |

### **Documentos**
| Campo          | Tipo         | Descrição                | Exemplo               |
|----------------|--------------|--------------------------|-----------------------|
| `cnpj`         | string (18)   | CNPJ da escola (formatado) | `00.000.000/0001-00`  |
| `ato_criacao`  | string (50)   | Número do ato de criação | `Portaria 123/2020`   |
| `inscricao_estadual` | string (20) | Inscrição estadual (se houver) | `1234567890`       |
| `inscricao_municipal` | string (20) | Inscrição municipal (se houver) | `1234567890`       |

### **Contato**
| Campo         | Tipo          | Descrição               | Exemplo                |
|---------------|---------------|-------------------------|------------------------|
| `telefone`    | string (15)    | Telefone principal      | `(11) 9999-9999`       |
| `email`       | string (100)   | E-mail institucional    | `contato@escola.com`   |
| `site`        | string (100)   | Site oficial da escola  | `https://escola.com`   |
| `whatsapp`    | string (15)    | Número de WhatsApp      | `(11) 99999-9999`      |

### **Endereço**
| Campo         | Tipo         | Descrição      | Exemplo         |
|---------------|--------------|----------------|-----------------|
| `cep`         | string (9)    | CEP da escola  | `00000-000`     |
| `logradouro`  | string (150)  | Rua/Avenida    | `Av. das Flores`|
| `numero`      | string (10)   | Número         | `123`           |
| `complemento` | string (100)  | Complemento do endereço (opcional) | `Bloco A`  |
| `bairro`      | string (100)  | Bairro         | `Centro`        |
| `cidade`      | string (100)  | Cidade         | `São Paulo`     |
| `estado`      | string (50)   | Estado         | `SP`            |
| `pais`        | string (100)  | País           | `Brasil`        |

### **Gestão e Administrativo**
| Campo           | Tipo       | Descrição                     | Exemplo       |
|-----------------|------------|-------------------------------|---------------|
| `diretor_id`    | foreignId  | ID do diretor (`users`)       | `1`           |
| `data_fundacao` | date       | Data de fundação da escola    | `1995-05-10`  |

### **Configurações**
| Campo                 | Tipo         | Descrição                     | Exemplo               |
|-----------------------|--------------|-------------------------------|-----------------------|
| `ano_letivo_atual_id` | foreignId    | ID do ano letivo atual        | `3`                   |
| `logo_path`           | string (255) | Caminho da logo institucional | `escolas/logos/logo_1.png` |
| `timezone`            | string (50)  | Fuso horário                  | `America/Sao_Paulo`   |
| `configuracao_geral`  | json         | Configurações gerais (como calendário escolar, número de faltas, etc.) | `{"calendario": "2024-2025", "limite_faltas": 60}` |

### **Status**
| Campo     | Tipo     | Descrição            | Exemplo |
|-----------|----------|----------------------|---------|
| `ativo`   | boolean  | Status da escola (ativa ou inativa) | `true`  |
| `suspensa`| boolean  | Se a escola está suspensa ou não | `false` |



---

## 📦 Campos Opcionais
```markdown
- `rede_ensino` (`string`): Rede de ensino (Pública, Privada, Filantrópica).
- `mantenedora` (`string`): Nome da entidade mantenedora.
- `cor_primaria` (`string`): Código HEX para temas (#FF5733).
- `informacoes_adicionais` (`text`): Observações adicionais sobre a escola.
