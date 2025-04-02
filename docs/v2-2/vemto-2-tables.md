# Tabelas

***

No Vemto 2, as tabelas representam a estrutura do banco de dados e são visualizadas diretamente no Editor de Schema. Cada tabela pode conter campos, índices e relacionamentos.

![Tabelas](https://placeholder-for-vemto2-tables-screenshot.png)

* [# Tabelas](#-tabelas)
* [Criando](#criando)
* [Gerenciando](#gerenciando)
* [Posicionamento](#posicionamento)
* [Campos](#campos)
* [Estados da Tabela](#estados-da-tabela)
* [Opções](#opções)

## Criando

Para criar uma nova tabela no Editor de Schema:

1. Clique no botão **Adicionar Entidade** na barra de ferramentas (ou use o atalho CTRL + Shift + T)
2. Digite o nome da tabela
3. Marque a opção "Adicionar um modelo padrão" se desejar criar um modelo junto com a tabela
4. Clique em "Criar"

![Criar Tabela](https://placeholder-for-vemto2-create-table.png)

O Vemto 2 segue as convenções de nomenclatura do Laravel, criando nomes de tabelas em plural e minúsculas (ex: "users" para o modelo "User").

## Gerenciando

Cada tabela no Editor de Schema pode ser:

* **Movida** - Arraste a tabela pelo cabeçalho para reposicioná-la
* **Selecionada** - Clique na tabela para ver suas opções detalhadas
* **Excluída** - Use o menu de opções da tabela e selecione "Remover"
* **Transferida** - Mova a tabela para outra seção do schema através do menu de opções

Ao selecionar uma tabela, o painel lateral se abre mostrando suas opções detalhadas, campos e modelos associados.

## Posicionamento

O Vemto 2 oferece recursos avançados para organizar visualmente suas tabelas:

* **Organização Automática** - Disponível no menu de opções da barra de ferramentas
* **Organização Horizontal** - Organiza as tabelas em um layout horizontal
* **Posicionamento Manual** - Arraste as tabelas para qualquer posição no schema

As posições das tabelas são salvas automaticamente e mantidas entre sessões.

## Campos

Cada tabela pode conter múltiplos campos que definem sua estrutura. Para gerenciar campos:

1. Selecione a tabela para abrir o painel de opções
2. Na seção de campos, você pode:
   * Adicionar novos campos com o botão "Adicionar Campo"
   * Reordenar campos arrastando-os pelas barras laterais
   * Configurar propriedades através das opções básicas e avançadas
   * Remover campos com o botão de exclusão

Para mais detalhes sobre campos, consulte a [documentação de Campos](./vemto-2-fields.md).

## Estados da Tabela

As tabelas no Vemto 2 podem estar em diferentes estados, indicados visualmente:

* **Normal** - Tabela existente e sincronizada
* **Nova (Draft)** - Tabela recém-criada que ainda não foi salva em uma migração
* **Alterada** - Tabela com modificações pendentes
* **Removida** - Tabela marcada para remoção na próxima migração

Esses estados são indicados junto ao nome da tabela no cabeçalho.

![Estados da Tabela](https://placeholder-for-vemto2-table-states.png)

## Opções

Ao clicar no menu de opções (três pontos) de uma tabela, você tem acesso a:

* **Mover para outra seção** - Transfere a tabela para outra seção do schema
* **Remover** - Marca a tabela para remoção

Para tabelas marcadas como removidas, um botão de "Desfazer remoção" fica disponível para reverter esta ação.

O Vemto 2 gerencia automaticamente as migrações associadas às operações de criação, alteração e remoção de tabelas.
