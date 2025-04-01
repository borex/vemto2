# Campos

***

Os campos podem ser adicionados a partir do painel de opções da entidade (aberto ao clicar em uma tabela ou modelo). O Vemto 2 suporta a maioria dos tipos de campos disponíveis nas [Migrações do Laravel](https://laravel.com/docs/migrations) e oferece recursos adicionais para configurar cada campo.

## Adicionando Campos

Para adicionar um novo campo:

1. Clique em uma tabela ou modelo no Editor de Esquema
2. No painel de opções da entidade, clique em "Add Field" ou botão similar
3. Digite o nome do campo e escolha o tipo
4. Configure as opções adicionais conforme necessário
5. Salve as alterações

> **Recomendação**: Use nomes de campos em minúsculas para seguir as convenções do Laravel.

### Detecção Automática de Tipos

O Vemto 2 possui uma extensa biblioteca interna de campos e tentará identificar automaticamente:

- O tipo de campo
- A configuração do faker (para seed de dados)
- Outras opções relevantes

Por exemplo, se você digitar "slug" como nome do campo, o Vemto 2 sugerirá automaticamente:
- Tipo: String
- Faker: $faker->slug

## Opções de Campo

As opções de campo estão acessíveis clicando no ícone de engrenagem ao lado do tipo de campo. Dependendo do tipo, as seguintes opções podem estar disponíveis:

### Opções Básicas

- **Nullable** - Define se o campo pode ser nulo ou não
- **Hidden** - Define se o campo é oculto na serialização do modelo
- **Fillable** - Define se o campo pode ser preenchido em massa (disponível no modo Fillable)
- **Guarded** - Define se o campo é protegido contra atribuição em massa (disponível no modo Guarded)
- **Unique** - Define se o campo deve ter um índice único
- **Index** - Define se o campo deve ter um índice simples
- **Default Value** - Define o valor padrão do campo
- **Faker** - Define o faker para seed de dados e testes
- **Size** - Define o tamanho do campo
- **Options** - Define as opções para campos do tipo Enum e Set
- **Primary Key** - Define se o campo é uma chave primária

> **Nota**: Entidades podem ter apenas uma chave primária. Ao alterar um campo para chave primária, o Vemto 2 automaticamente ajusta todos os relacionamentos e chaves estrangeiras relacionados.

## Tipos de Campos

O Vemto 2 suporta diversos tipos de campos, incluindo:

- **String** - Para textos curtos
- **Text** - Para textos longos
- **Integer** - Para números inteiros
- **Float/Decimal** - Para números decimais
- **Boolean** - Para valores verdadeiro/falso
- **Date/DateTime** - Para datas e horas
- **Enum** - Para conjuntos restritos de valores
- **JSON** - Para dados em formato JSON
- E muitos outros tipos compatíveis com Laravel

## Configurações Especiais do Faker

Além de suportar [faker](https://github.com/FakerPHP/Faker), o Vemto 2 aceita algumas definições especiais de faker:

- **Código PHP** - Você pode definir um faker como código PHP personalizado
  Exemplo: `array_rand(array_flip(['maçã', 'banana']), 1)`

- **'{DEFAULT_OR_FIRST}'** - Usa o valor padrão do campo ou o primeiro valor (para campos Enum)

- **{SIZE}** - Substitui uma seção do faker pelo tamanho do campo
  Exemplo: `Str::random({SIZE})` se transforma em `Str::random(64)` para um campo de tamanho 64

- **Valor Fixo** - Você pode usar um valor fixo para o faker (lembre-se de adicionar aspas para valores string)

## Campos de Chave Estrangeira

Ao marcar um campo como Chave Estrangeira, as seguintes opções estarão disponíveis:

- **Tabela/Modelo de Referência** - Define a tabela ou modelo referenciado
- **Campo de Referência** - Define o campo referenciado
- **On Update** - Define a ação SQL a executar ao atualizar os dados estrangeiros (Ex: CASCADE)
- **On Delete** - Define a ação SQL a executar ao excluir os dados estrangeiros (Ex: CASCADE)

> **Recomendação**: Siga as convenções do Eloquent ao criar chaves estrangeiras para garantir compatibilidade com o ORM do Laravel.

***

Próximo passo: Aprenda como [criar e gerenciar relacionamentos](relacionamentos.md) entre seus modelos.
