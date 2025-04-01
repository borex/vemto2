# Navegação no Schema do Projeto

Este guia explica como navegar e interagir com o esquema visual do seu projeto no Vemto 2.

## Sumário

- [Visão Geral](#visão-geral)
- [Navegação Básica](#navegação-básica)
- [Zoom e Centralização](#zoom-e-centralização)
- [Seleção e Foco](#seleção-e-foco)
- [Organização das Tabelas](#organização-das-tabelas)

## Visão Geral

O editor de schema do Vemto 2 permite visualizar e manipular todas as tabelas do seu projeto em uma interface visual interativa. Você pode posicionar, redimensionar, conectar e organizar tabelas em um canvas extenso.

## Navegação Básica

### Movimentação no Canvas

1. **Arrastar o Canvas**: Clique e segure o botão do mouse em qualquer área vazia do canvas e arraste para mover-se pelo espaço de trabalho.
2. **Barras de Rolagem**: Use as barras de rolagem nas bordas do canvas para navegar horizontalmente e verticalmente.
3. **Rolagem do Mouse**: Use a rolagem do mouse para mover-se verticalmente no canvas.

### Dicas para Navegação

- O cursor muda para "mão fechada" (grabbing) quando você está arrastando o canvas
- O canvas tem dimensões muito grandes (50.000 x 50.000 pixels) para acomodar projetos de qualquer tamanho
- Sua posição de rolagem é salva automaticamente para cada seção do schema

## Zoom e Centralização

### Controle de Zoom

- O nível de zoom é controlado pela propriedade `zoom` da seção selecionada do schema
- O zoom afeta a escala em que as tabelas são exibidas no canvas
- O zoom é aplicado a partir do centro do campo de visão atual

### Centralização

Para centralizar a visualização:

1. **Centralização Automática**: Ocorre automaticamente quando uma nova seção do schema é carregada
2. **Centralização em uma Tabela**: Quando você foca em uma tabela específica, a visualização centraliza nessa tabela
3. **Redefinir Visualização**: A aplicação pode centralizar a visualização quando necessário através dos controles da interface

## Seleção e Foco

### Selecionando Tabelas

- Clique em uma tabela para selecioná-la
- A tabela selecionada aparecerá em destaque enquanto as outras tabelas ficarão com opacidade reduzida (30%)
- Ao selecionar uma tabela, o painel de opções da tabela será exibido

### Focando em Tabelas

1. Quando uma tabela recebe foco (através da interface ou operações programáticas):
   - A visualização é centralizada nesta tabela
   - O zoom é reajustado para 100%
   - A tabela é brevemente animada com um efeito "pulse" para chamar a atenção

## Organização das Tabelas

### Posicionamento Automático

A aplicação pode reorganizar automaticamente suas tabelas:

1. As tabelas são posicionadas com base na sua distância em relação ao centro
2. A animação de reposicionamento ocorre de forma sequencial, começando pelas tabelas mais próximas ao centro
3. Durante a reorganização, as conexões entre tabelas são temporariamente ocultas
4. Após a conclusão da animação, as conexões são redesenhadas automaticamente

### Dica para Organização Manual

- Você pode arrastar as tabelas para posicioná-las manualmente no canvas
- As posições das tabelas são salvas automaticamente

## Teclas de Atalho e Gestos

O editor de schema também suporta interação eficiente através de:

- **Clique duplo**: Alterna o modo de foco em uma tabela
- **Escape**: Limpa a seleção atual
- **Gestos de pinça** (em dispositivos com tela sensível ao toque): Controla o zoom

---

*Este documento de navegação foi gerado automaticamente com base na implementação atual do Vemto 2.*
