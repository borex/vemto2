# Campos

***

No Vemto 2, os campos são gerenciados através de uma interface redesenhada que oferece melhor organização e suporte aos tipos de campo das [Migrações do Laravel](https://laravel.com/docs/10.x/migrations).

![Campos](https://placeholder-for-vemto2-fields-screenshot.png)

* [# Campos](#-campos)
* [Criando](#criando)
* [Opções Básicas](#opções-básicas)
* [Opções Avançadas](#opções-avançadas)
* [Tipos de Campos](#tipos-de-campos)
* [Opções Específicas](#opções-específicas)
* [Configurações de Faker](#configurações-de-faker)

## Criando

Para adicionar um novo campo, selecione a tabela desejada no Editor de Schema e clique no botão **Adicionar Campo**. Digite o nome do campo e selecione o tipo.

> É **altamente recomendado** usar nomes de campo em minúsculas

![Adicionar Campo](https://placeholder-for-vemto2-add-field.png)

O Vemto 2 inclui uma biblioteca de campos que identifica automaticamente o tipo, o faker e as opções com base no nome do campo. Por exemplo, se você digitar "slug", o sistema sugerirá automaticamente o tipo _String_ e adicionará o _"$faker->slug"_ como faker.

## Opções Básicas

Cada campo apresenta na sua linha principal:

* **Nome** - Define o nome do campo na tabela
* **Tipo** - Define o tipo do campo (string, integer, boolean, etc.)
* **Nullable** - Define se o campo pode ser nulo
* **Remover** - Remove o campo da tabela

Os campos podem ser reordenados arrastando-os pelas barras à esquerda de cada linha.

## Opções Avançadas

Para expandir as opções avançadas, clique na seta para baixo à direita do campo. As opções incluem:

* **Unique** - Define se o campo tem um índice único
* **Index** - Define se o campo tem um índice simples
* **Unsigned** - Define se o campo é unsigned (apenas para campos numéricos)
* **Auto Increment** - Define se o campo é auto incrementável
* **Length** - Define o tamanho do campo
* **Default Value** - Define o valor padrão do campo
* **Raw** - Define se o valor padrão deve ser tratado como SQL bruto

![Opções Avançadas](https://placeholder-for-vemto2-advanced-options-screenshot.png)

## Tipos de Campos

O Vemto 2 otimizou a lista de tipos de campo disponíveis, mantendo os mais usados:

* Tipos de texto: string, char, text, mediumText, longText
* Tipos numéricos: integer, bigInteger, decimal, double, float
* Tipos de data/hora: date, dateTime, dateTimeTz, timestamp, time
* Tipos especiais: boolean, json, enum, set, uuid
* Tipos geográficos: geometry, geography, point, lineString, polygon

Alguns tipos legados como `bigIncrements`, `increments`, `mediumIncrements`, `smallIncrements` e `tinyIncrements` foram substituídos por opções mais modernas usando a combinação de tipos com as propriedades "Auto Increment" e "Unsigned".

## Opções Específicas

Dependendo do tipo selecionado, opções adicionais estarão disponíveis:

* **Campos Decimais** - Possui opções de Precision (total) e Scale (places)
* **Campos Enum e Set** - Permite adicionar e remover opções da lista

Para adicionar uma opção a um campo Enum ou Set:
1. Clique em "Adicionar Opção"
2. Digite o valor da opção
3. Repita conforme necessário

## Configurações de Faker

O Vemto 2 oferece diversas opções para configurar o faker de um campo:

* **Sintaxe de Faker** - Use qualquer método da biblioteca [Faker](https://github.com/FakerPHP/Faker)
* **Código PHP** - Use código PHP personalizado, como:
  ```php
  array_rand(array_flip(['apple', 'banana']), 1)
  ```
* **{DEFAULT_OR_FIRST}** - Usa o valor padrão do campo ou o primeiro valor das opções
* **{SIZE}** - Substitui por tamanho do campo, útil em fakers como `Str::random({SIZE})`
* **Valores Fixos** - Use um valor fixo (lembre-se de adicionar aspas para strings)

Para campos únicos, o Vemto 2 detecta automaticamente e ajusta o faker para gerar valores únicos quando necessário.
