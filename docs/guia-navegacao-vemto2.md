# Guia de Navegação do Vemto2

Este documento é um guia completo para ajudar você a navegar pelo Vemto2, uma ferramenta poderosa para modelagem de esquemas de banco de dados e criação de modelos. Se você é novo no Vemto2, este guia o ajudará a entender como interagir com o editor de esquemas e suas diversas funcionalidades.

## Sumário
- [Introdução à Interface](#introdução-à-interface)
- [Navegação Básica](#navegação-básica)
- [Trabalhando com Tabelas](#trabalhando-com-tabelas)
- [Entendendo os Elementos Visuais](#entendendo-os-elementos-visuais)
- [Organização do Esquema](#organização-do-esquema)
- [Dicas para Iniciantes](#dicas-para-iniciantes)
- [Solução de Problemas Comuns](#solução-de-problemas-comuns)

## Introdução à Interface

O Vemto2 apresenta uma interface intuitiva para modelagem de bancos de dados. A área principal é o **Editor de Esquemas** (Schema Editor), onde você visualiza e manipula tabelas e suas relações.

### Componentes Principais

- **Tela de Esquema**: A área central onde suas tabelas são exibidas e organizadas
- **Tabelas**: Representações visuais das tabelas do banco de dados
- **Modelos**: Representações dos modelos associados às tabelas
- **Barras de Ferramentas**: Dão acesso às principais funcionalidades

## Navegação Básica

### Movimentação na Tela

Para navegar pelo seu esquema, você pode:

- **Arrastar a Tela**: Clique em qualquer área vazia e mantenha pressionado enquanto arrasta o mouse. O cursor mudará para "grabbing" (mão fechada) durante a movimentação.
- **Rolagem**: Use a roda do mouse para mover verticalmente, ou segure Shift enquanto rola para mover horizontalmente.
- **Barras de Rolagem**: Utilize as barras de rolagem nas bordas da tela para navegação precisa.

### Controle de Zoom

O Vemto2 permite ajustar o nível de zoom para melhor visualização:

- O zoom é específico para cada seção do esquema e é salvo entre sessões.
- O nível de zoom atual é exibido como uma escala (ex: 1.0 = 100%).
- Quando você seleciona um novo esquema ou uma nova seção, o zoom será ajustado automaticamente.
- Ao centralizar em uma tabela específica, o zoom é restaurado para 100% por padrão.

### Seções do Esquema

Seu projeto pode ter múltiplas seções de esquema, permitindo organizar tabelas relacionadas:

- Você pode alternar entre diferentes seções do esquema através do seletor de seções.
- Cada seção mantém suas próprias configurações de visualização (zoom, posição de rolagem).
- A primeira vez que você abre uma seção, a visualização é automaticamente centralizada.

## Trabalhando com Tabelas

### Visualizando Tabelas

Cada tabela no esquema é representada por um componente visual que contém:

- **Cabeçalho da Tabela**: Exibe o nome da tabela e botões de ação
- **Lista de Colunas**: Mostra todas as colunas com seus tipos e propriedades
- **Modelos Associados**: Exibe os modelos relacionados a esta tabela

### Status das Tabelas

As tabelas podem exibir diferentes status visuais:

- **Rascunho (Draft)**: Tabelas recém-criadas que ainda não foram salvas em uma migração
- **Alterada (Changed)**: Tabelas que foram modificadas desde a última migração
- **Removida (Removed)**: Tabelas marcadas para remoção na próxima migração

### Seleção de Tabelas

Para interagir com uma tabela:

1. **Selecionar uma Tabela**: Clique uma vez na tabela. Isso destacará a tabela selecionada e esmaecerá as outras.
2. **Desselecionar todas as Tabelas**: Clique em qualquer área vazia do esquema.
3. **Centralizar em uma Tabela**: Para focar em uma tabela específica, você pode escolher a opção de centralizar a tabela, que automaticamente ajustará o zoom e a posição da visualização.

### Menu de Opções da Tabela

Cada tabela possui um menu de opções acessível pelo ícone no canto superior direito:

- **Mover para outra Seção**: Transfere a tabela para uma seção diferente do esquema
- **Remover Tabela**: Marca a tabela para remoção (com opção de desfazer)

### Movendo Tabelas

Para organizar seu esquema:

1. **Arraste pelo Cabeçalho**: Posicione o cursor sobre o cabeçalho da tabela (onde o cursor muda para "move")
2. **Arraste para Reposicionar**: Clique e arraste para a nova posição desejada
3. **Posição Salva Automaticamente**: A nova posição é salva automaticamente

Quando uma tabela é reposicionada, todas as conexões entre tabelas são redesenhadas automaticamente.

## Entendendo os Elementos Visuais

### Colunas de Tabela

Cada coluna é exibida com indicadores visuais para ajudar a identificar seu tipo e propriedades:

- **Indicador de Tipo** (círculo colorido):
  - **Amarelo**: Chave primária
  - **Vermelho**: Chave estrangeira
  - **Laranja**: Coluna única
  - **Azul**: Índice não-estrangeiro
  - **Cinza**: Coluna regular

- **Nome da Coluna**: Segue o mesmo esquema de cores do indicador de tipo

- **Tipo de Dados**: Exibido em texto menor após o nome da coluna
  - Se o tipo tiver um comprimento/precisão definido, será mostrado entre parênteses (ex: VARCHAR(255))

- **Indicadores de Propriedade**: 
  - **U**: Aparece destacado quando a coluna é unsigned
  - **N**: Vermelho para colunas nullable, cinza para não-nullable

- **Status Visual Especial**:
  - Uma borda vermelha ao redor de uma coluna indica que ela está em um estado inválido
  - Texto riscado e opacidade reduzida indica que a coluna será removida

### Modelos Associados

Os modelos são representados abaixo das colunas em cada tabela:

- **Cabeçalho do Modelo**: 
  - Ícone do tipo de documento (rascunho ou modelo completo)
  - Ícone de usuário (para modelos autenticáveis)
  - Nome do modelo

- **Relacionamentos**:
  - Cada relacionamento é listado com seu tipo (ex: "HasMany:")
  - Seguido pelo nome do modelo relacionado
  - E o nome do relacionamento entre parênteses

- **Status Visual**:
  - Rascunhos são marcados com "(Draft)"
  - Modelos ou relacionamentos inválidos têm uma borda vermelha
  - Itens removidos aparecem riscados e com opacidade reduzida

## Organização do Esquema

### Organização Automática

O Vemto2 oferece funcionalidades para ajudar a organizar seu esquema:

- **Animações de Posicionamento**: Quando as tabelas são reorganizadas, elas se movem suavemente para suas novas posições.
- **Centralização Automática**: Quando uma seção é aberta pela primeira vez ou quando você seleciona uma tabela específica para centralizar.

### Organização Manual

Para criar uma estrutura visual lógica:

1. **Agrupe Tabelas Relacionadas**: Posicione tabelas com relacionamentos próximas umas das outras.
2. **Use Seções Diferentes**: Divida tabelas em seções lógicas para facilitar o trabalho em projetos grandes.
3. **Organize por Domínio**: Posicione tabelas relacionadas ao mesmo domínio de negócios próximas.

## Dicas para Iniciantes

### Primeiros Passos

Quando abrir o Vemto2 pela primeira vez:

1. **Explore o Esquema**: Use o arrastar e soltar para navegar pela tela e entender a estrutura geral.
2. **Identifique Tabelas-Chave**: Localize as tabelas principais do seu projeto para entender a estrutura de dados.
3. **Observe os Relacionamentos**: Veja como as tabelas estão conectadas para compreender o modelo de dados.

### Fluxo de Trabalho Eficiente

Para trabalhar de forma produtiva:

1. **Use a Centralização**: Em vez de procurar manualmente por tabelas, use a função de centralizar em tabelas específicas.
2. **Selecione para Foco**: Selecione uma tabela para trabalhar nela exclusivamente, reduzindo distrações.
3. **Organize Conforme Trabalha**: Arraste as tabelas para posições lógicas à medida que trabalha com elas.

### Atalhos e Técnicas

- **Seleção Rápida**: Um clique rápido seleciona uma tabela
- **Evite Arrastar Acidentalmente**: Para interagir com elementos dentro da tabela, certifique-se de clicar e não arrastar o cabeçalho
- **Desfazer Remoções**: Se remover uma tabela por engano, use o botão de desfazer (ícone de seta curva) que aparece quando uma tabela está marcada para remoção

## Solução de Problemas Comuns

### Tabela Não Aparece

Se uma tabela não estiver visível:
1. Verifique se você está na seção correta do esquema
2. Tente diminuir o zoom para ver uma área maior
3. Verifique se a tabela não foi removida anteriormente

### Relacionamentos Ausentes

Se as conexões entre tabelas não aparecerem:
1. Certifique-se de que ambas as tabelas estão visíveis na tela
2. Verifique se o relacionamento está corretamente definido
3. Tente reposicionar ligeiramente uma das tabelas para forçar o redesenho das conexões

### Problemas de Desempenho

Se o editor ficar lento com muitas tabelas:
1. Divida seu esquema em múltiplas seções
2. Feche outras aplicações que consomem muitos recursos
3. Tente reduzir o zoom para melhorar o desempenho de renderização

### Indicadores de Erro

Quando você vê uma borda vermelha ao redor de um elemento:
1. Verifique se todas as colunas obrigatórias estão definidas
2. Certifique-se de que nomes de tabelas e colunas não contenham caracteres inválidos
3. Verifique se os relacionamentos referem-se a tabelas e colunas existentes

---

Este guia abrange as principais funcionalidades de navegação no Vemto2. À medida que você se familiariza com a interface, descobrirá fluxos de trabalho e técnicas que melhor atendem às suas necessidades específicas de modelagem de dados.

Para mais informações e suporte, consulte a documentação completa ou entre em contato com a equipe do Vemto2.
