# Relacionamentos

***

Os relacionamentos podem ser adicionados a partir do painel de opções da tabela (que você abre clicando na tabela no Editor de Esquema). O Vemto 2 simplifica a criação e gerenciamento de todos os tipos de relacionamentos do Laravel.

> **Nota Importante**: O Vemto 2 gera automaticamente as chaves estrangeiras, tabelas pivot e relacionamentos inversos. Não é necessário criar esses elementos manualmente.

## Criando Relacionamentos

Para adicionar um novo relacionamento:

1. Clique em uma tabela no Editor de Esquema para abrir o painel de opções
2. Na seção de relacionamentos, clique em "Add Relationship" ou no botão com ícone de "+"
3. Selecione o tipo de relacionamento
4. Selecione o modelo relacionado
5. Configure as opções específicas do tipo de relacionamento
6. Clique em "Save" para salvar o relacionamento

## Tipos de Relacionamentos

### Belongs To

Um relacionamento [Belongs To](https://laravel.com/docs/eloquent-relationships#one-to-many-inverse) tem as seguintes opções:

- **Nome do Relacionamento** - Por padrão, é o nome do modelo relacionado em minúsculas
- **Nome da Chave Estrangeira** - O Vemto 2 sugere um nome seguindo o padrão do Laravel

Após salvar um relacionamento "Belongs To", um relacionamento inverso "Has Many" será automaticamente adicionado ao modelo relacionado.

### Has Many e Has One

Os relacionamentos [Has Many](https://laravel.com/docs/eloquent-relationships#one-to-many) e [Has One](https://laravel.com/docs/eloquent-relationships#one-to-one) têm as seguintes opções:

- **Nome do Relacionamento** - Por padrão, é o nome da coleção relacionada em minúsculas
- **Nome da Chave Estrangeira** - O Vemto 2 sugere um nome seguindo o padrão do Laravel

Após salvar um relacionamento "Has Many" ou "Has One", um relacionamento inverso "Belongs To" será automaticamente adicionado ao modelo relacionado.

### Belongs To Many (Muitos para Muitos)

Um relacionamento [Belongs To Many](https://laravel.com/docs/eloquent-relationships#many-to-many) tem as seguintes opções:

- **Nome do Relacionamento** - Por padrão, é o nome da coleção relacionada em minúsculas
- **Nome da Tabela Pivot** - Segue a convenção padrão do Laravel
- **Nome da Chave do Modelo Local** - Nome da FK para o modelo local na tabela pivot
- **Nome da Chave do Modelo Relacionado** - Nome da FK para o modelo relacionado na tabela pivot

Após salvar um relacionamento "Belongs To Many", um relacionamento inverso também será adicionado ao modelo relacionado, e uma tabela pivot será criada se necessário.

#### Opções Adicionais para Belongs To Many

O Vemto 2 oferece opções adicionais para relacionamentos muitos-para-muitos:

- **With Pivot Columns** - Permite incluir colunas adicionais da tabela pivot
- **Included Pivot Columns** - Selecione quais colunas pivot devem ser incluídas no relacionamento

### Relacionamentos Through e Morph

O Vemto 2 também suporta tipos avançados de relacionamentos:

- **Through** - Para relacionamentos "has-one-through" e "has-many-through" 
- **Morph** - Para relacionamentos polimórficos como "morphTo", "morphOne", "morphMany" e "morphToMany"

## Gerenciando Relacionamentos

### Visualização de Relacionamentos

Os relacionamentos são exibidos no Editor de Esquema como conexões entre tabelas e também listados dentro da visualização do modelo na tabela.

### Editando Relacionamentos

Para editar um relacionamento existente:

1. Clique na tabela para abrir o painel de opções
2. Encontre o relacionamento na lista
3. Modifique as configurações conforme necessário
4. Clique em "Save" para aplicar as alterações

### Removendo Relacionamentos

Para remover um relacionamento:

1. Clique na tabela para abrir o painel de opções
2. Encontre o relacionamento na lista
3. Clique no menu de opções do relacionamento (três pontos) 
4. Selecione "Delete"
5. Confirme a remoção

Ao remover um relacionamento, você pode optar por:
- Excluir o relacionamento inverso
- Excluir chaves estrangeiras e tabelas pivot associadas

## Validação de Relacionamentos

O Vemto 2 verifica automaticamente a validade dos relacionamentos e destacará quaisquer problemas:

- Relacionamentos circulares em tabelas não salvas
- Relacionamentos inválidos ou incompletos
- Chaves estrangeiras ausentes ou incorretas

> **Dica**: Se um relacionamento estiver inválido, ele será destacado em vermelho. Verifique as informações e faça as correções necessárias.

***

Esta documentação oferece uma visão geral das principais funcionalidades do Vemto 2. À medida que você explora o aplicativo, você descobrirá recursos adicionais e fluxos de trabalho otimizados para acelerar seu desenvolvimento Laravel.
