# Modelos

***

No Vemto 2, os modelos representam as entidades do Eloquent que interagem com as tabelas do banco de dados. A interface de configuração de modelos foi redesenhada em um sistema de abas para facilitar a organização.

![Modelos](https://placeholder-for-vemto2-models-screenshot.png)

* [# Modelos](#-modelos)
* [Abas de Configuração](#abas-de-configuração)
  * [Dados](#dados)
  * [Relacionamentos](#relacionamentos)
  * [Código](#código)
  * [Imports](#imports)
  * [Configurações](#configurações)
* [Propriedades Especiais](#propriedades-especiais)
* [Gerenciando Casts](#gerenciando-casts)
* [Salvando Alterações](#salvando-alterações)

## Abas de Configuração

O Vemto 2 organiza as configurações do modelo em abas temáticas para facilitar o acesso e a organização.

### Dados

Na aba **Dados**, você pode configurar propriedades fundamentais:

* **Namespace** - Define o namespace do modelo
* **Nome** - Define o nome do modelo
* **Collection** - Define o nome da collection (plural)
* **Timestamps** - Ativa/desativa os timestamps automáticos (created_at, updated_at)
* **SoftDeletes** - Ativa/desativa a funcionalidade de soft delete

Também é possível configurar as estratégias de atribuição em massa:
* **Guarded** - Configura os campos protegidos contra atribuição em massa
* **Fillable** - Configura os campos permitidos para atribuição em massa

Além de propriedades especiais:
* **Hidden** - Campos ocultados em arrays e JSON
* **Dates** - Campos tratados como instâncias Carbon/DateTime
* **Appends** - Atributos virtuais anexados às serializações

![Aba de Dados](https://placeholder-for-vemto2-model-data-tab.png)

### Relacionamentos

Na aba **Relacionamentos**, você gerencia todos os relacionamentos do modelo, incluindo:

* Belongs To
* Has Many e Has One
* Belongs To Many
* Relacionamentos Morph
* Has Many Through

Para mais detalhes, consulte a [documentação de Relacionamentos](./vemto-2-relationships.md).

### Código

Na aba **Código**, você pode definir hooks e personalizar o modelo com métodos e lógica adicional:

* Visualize o código do modelo
* Adicione métodos personalizados
* Modifique comportamentos padrão

O editor permite uma visualização precisa de como o código final será gerado.

### Imports

Na aba **Imports**, você configura classes e interfaces:

* **Classe Pai** - Define a classe pai do modelo (se diferente de Model)
* **Traits** - Adiciona traits ao modelo usando uma interface simples
* **Interfaces** - Adiciona interfaces que o modelo implementa

![Aba de Imports](https://placeholder-for-vemto2-model-imports-tab.png)

### Configurações

Na aba **Configurações**, você define opções adicionais:

* **Quantidade de Seeders** - Define quantos registros serão criados pelo seeder
* **Executar Seeder** - Define se o seeder será executado automaticamente
* **Comentar Atributos** - Ativa/desativa comentários para atributos
* **Comentar Métodos** - Ativa/desativa comentários para métodos

## Propriedades Especiais

O Vemto 2 permite configurar facilmente propriedades especiais do Eloquent:

* **Hidden** - Campos ocultados na serialização (ideal para senhas e dados sensíveis)
* **Dates** - Campos automaticamente convertidos para instâncias Carbon
* **Appends** - Atributos acessores anexados automaticamente à serialização

Essas propriedades são configuradas através de interfaces intuitivas de seleção múltipla que mostram todos os campos disponíveis.

## Gerenciando Casts

A interface de gerenciamento de casts foi aprimorada no Vemto 2:

1. Na aba **Dados**, localize a seção **Casts**
2. Para adicionar um novo cast:
   * Clique em "Adicionar Coluna"
   * Selecione o campo a ser convertido
   * Defina o tipo de conversão (string, integer, array, etc.)
3. Para remover um cast, use o menu de opções e selecione "Delete"

![Gerenciamento de Casts](https://placeholder-for-vemto2-casts-management.png)

## Salvando Alterações

Quando você faz alterações nos modelos, o Vemto 2 detecta automaticamente essas mudanças e as agrupa para revisão:

1. Um botão "Salvar" aparece no canto inferior esquerdo da tela
2. Ao clicar, você pode revisar todas as alterações por modelo
3. Para cada modelo alterado, você pode:
   * Verificar o novo código a ser gerado
   * Resolver conflitos, se existirem
   * Confirmar as alterações

Os modelos marcados com "Has conflicts" requerem resolução manual de conflitos antes de serem salvos.
