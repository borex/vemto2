# Editor de Schema

***

O Editor de Schema do Vemto 2 foi completamente redesenhado para oferecer uma experiência mais intuitiva e produtiva na criação e gerenciamento de modelos, tabelas e relacionamentos.

![Editor de Schema](https://placeholder-for-vemto2-schema-editor-screenshot.png)

* [# Editor de Schema](#-editor-de-schema)
* [Interface](#interface)
* [Adicionando Entidades](#adicionando-entidades)
* [Navegação](#navegação)
* [Seções do Schema](#seções-do-schema)
* [Sincronização](#sincronização)
* [Recursos Visuais](#recursos-visuais)

## Interface

O Editor de Schema possui uma barra de ferramentas superior que contém:

* **Adicionar Entidade** - Cria novas tabelas ou modelos
* **Comentários** - Adiciona comentários ao schema (em breve)
* **Sincronizar** - Sincroniza o schema com o código fonte
* **Menu de Opções** - Acesso a funções adicionais como verificar mudanças, salvar como imagem, centralizar visualização e organizar tabelas
* **Controles de Zoom** - Permite aumentar ou diminuir o zoom
* **Busca** - Localiza rapidamente tabelas no schema
* **Seções** - Acesso às diferentes seções do schema

## Adicionando Entidades

Para adicionar uma nova entidade ao schema:

1. Clique no botão **Adicionar Entidade** na barra de ferramentas
2. Escolha um nome para a tabela
3. Marque a opção "Adicionar um modelo padrão" se desejar criar um modelo associado
4. Clique em "Criar"

A nova entidade será adicionada ao centro da visualização atual.

![Adicionar Entidade](https://placeholder-for-vemto2-add-entity-modal.png)

## Navegação

O Vemto 2 oferece várias formas de navegar pelo Editor de Schema:

* **Arrastar e Soltar** - Clique em qualquer área vazia e arraste para mover a visualização
* **Roda do Mouse** - Use a roda do mouse para aumentar ou diminuir o zoom
* **Botão de Centralizar** - Retorna a visualização para o centro
* **Busca** - Digite o nome de uma tabela na caixa de busca para localizá-la rapidamente

Ao usar o zoom, o Vemto 2 mantém o ponto sob o cursor como ponto focal, proporcionando uma experiência de navegação natural.

## Seções do Schema

O Vemto 2 permite organizar suas tabelas em diferentes seções, facilitando a gestão de projetos maiores:

1. Para criar uma nova seção, clique em "Nova Seção" na barra de ferramentas
2. Para mover uma tabela para outra seção, use o menu de opções da tabela e selecione "Mover para [nome da seção] schema"

Cada seção mantém suas próprias configurações de zoom e posição de rolagem, permitindo organizar visualmente diferentes áreas do seu projeto.

![Seções do Schema](https://placeholder-for-vemto2-schema-sections.png)

## Sincronização

O Vemto 2 detecta alterações tanto no schema quanto no código fonte do projeto:

* **Alterações no Schema** - São indicadas por um botão "Salvar" no canto inferior esquerdo
* **Alterações no Código** - São indicadas por um alerta na parte superior da tela

Para salvar alterações no schema:
1. Clique no botão "Salvar"
2. Revise as mudanças em tabelas e modelos
3. Selecione como deseja aplicar as alterações (criar novas migrações ou atualizar existentes)
4. Resolva quaisquer conflitos em modelos, se necessário
5. Clique em "Salvar alterações"

Para sincronizar com alterações do código fonte:
1. Clique no botão "Sync" no alerta ou na barra de ferramentas
2. Selecione quais elementos sincronizar (tabelas, modelos ou ambos)
3. Confirme a sincronização

## Recursos Visuais

O Editor de Schema do Vemto 2 inclui recursos visuais para facilitar o entendimento da estrutura do banco de dados:

* **Linhas de Conexão** - Mostram relacionamentos entre tabelas (linhas sólidas para relacionamentos diretos, linhas pontilhadas para relacionamentos indiretos)
* **Cores de Borda** - Indicam propriedades especiais (amarelo para chaves primárias, vermelho para chaves estrangeiras, etc.)
* **Organização Automática** - Organize automaticamente suas tabelas com um layout otimizado
* **Animações** - Transições suaves ao mover tabelas ou atualizar o schema

![Conexões do Schema](https://placeholder-for-vemto2-schema-connections.png)
