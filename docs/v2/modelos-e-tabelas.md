# Modelos e Tabelas

***

No Vemto 2, você pode criar e gerenciar modelos e tabelas diretamente no Editor de Esquema. Cada entidade de esquema suporta a maioria dos tipos de campos disponíveis nas [Migrações do Laravel](https://laravel.com/docs/migrations) e oferece funcionalidades adicionais para configurar seus modelos de forma eficiente.

## Entendendo Modelos e Tabelas

No Vemto 2, existem dois conceitos importantes:

- **Modelos** - Representam classes Eloquent do Laravel e geralmente têm uma tabela associada
- **Tabelas** - Representam tabelas no banco de dados que podem ou não ter um modelo associado

Ao visualizar o Editor de Esquema, você verá estas entidades representadas como caixas com suas respectivas colunas e modelos.

## Criando Modelos e Tabelas

Para criar uma nova entidade:

1. Clique no botão "Add Entity" ou similar no Editor de Esquema
2. Preencha os campos obrigatórios (nome, tipo, etc.)
3. Clique em "Save" ou "Create"

### Nomenclatura Automática

Ao criar um Modelo, o Vemto 2 sugere automaticamente:

- **Nome da Coleção** - Plural em inglês do nome do Modelo
- **Nome da Tabela** - Plural em inglês do nome do Modelo, em minúsculas

> **Recomendação**: Siga as [Convenções de Modelos do Eloquent](https://laravel.com/docs/eloquent#eloquent-model-conventions) ao criar modelos e tabelas.

Você pode alterar os nomes sugeridos se necessário, especialmente se estiver trabalhando com nomes que não são em inglês.

## Visualizando Modelos e Tabelas

No Editor de Esquema, as tabelas mostram:

- **Nome da Tabela** - No cabeçalho da caixa
- **Colunas** - Lista de campos com seus tipos e propriedades
- **Modelos Associados** - Modelos vinculados à tabela
- **Status** - Indicadores de "Draft" (rascunho), "Changed" (alterado) ou "Removed" (removido)

## Editando Modelos e Tabelas

Para editar uma entidade:

1. Clique na tabela ou modelo no Editor de Esquema
2. O painel de opções aparecerá, permitindo editar:
   - Campos
   - Relacionamentos
   - Outras configurações

### Status de Tabelas e Modelos

O Vemto 2 exibe diferentes status para suas entidades:

- **Draft** - Entidade nova ainda não salva na migração
- **Changed** - Entidade existente com alterações pendentes
- **Removed** - Entidade marcada para remoção

## Gerenciando Tabelas

### Movendo Tabelas

Para mover uma tabela no Editor de Esquema:
1. Clique e arraste a tabela para a nova posição
2. A posição será salva automaticamente

### Removendo Tabelas

Para remover uma tabela:
1. Clique no menu de opções da tabela (três pontos)
2. Selecione "Remove"
3. Confirme a remoção

Você pode desfazer a remoção clicando no ícone "Undo remove table" que aparece ao passar o mouse sobre a tabela marcada para remoção.

## Tabelas Pivot

As tabelas pivot são automaticamente criadas quando você define relacionamentos "Belongs To Many" entre modelos. Estas tabelas seguem as convenções do Laravel para tabelas pivot.

> **Nota**: O Vemto 2 gerencia automaticamente a criação e atualização de tabelas pivot quando você define relacionamentos.

***

Próximo passo: Aprenda como [adicionar e configurar campos](campos.md) às suas tabelas e modelos.
