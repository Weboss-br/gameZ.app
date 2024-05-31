# gameZ.app
GameZ.app é um sistema em WordPress que permite aos usuários cadastrar, gerenciar e comparar suas coleções de jogos, com funcionalidades de pontuação, comentários e integração futura com a API da Steam, Epic, AmazonGames, etc. Para cadastro e busca dos Games. 


# GameZ.app - Projeto de Cadastro e Comparação de Jogos

## Visão Geral

GameZ.app é um projeto desenvolvido em WordPress que permite aos usuários cadastrar e gerenciar suas coleções de jogos. O projeto também oferece funcionalidades para os usuários atribuírem pontuações, adicionarem comentários e exibirem thumbnails dos jogos. Futuramente, o projeto incluirá a integração com a API da Steam para sincronizar dados de jogos e permitir a comparação de listas de jogos com amigos.

## Funcionalidades

### Fase 1: Configuração Inicial
- Instalação do WordPress com o localwp.com
  - Configuração do ambiente de desenvolvimento local
  - Instalação e configuração do WordPress
    - Utilizaremos o Thema Astra e utilizarei o Thema Filho, para que não haja problema no update do theme
- Configuração de Temas e Plugins
  - Escolha de um tema base ou criação de um tema filho
  - Instalação de plugins essenciais (SEO, segurança, cache, etc.)

### Fase 2: Criação de Custom Post Types e Campos Personalizados
- Custom Post Type (CPT) para Jogos
  - Criação de um CPT chamado "Jogos" usando código ou plugin (por exemplo, Custom Post Type UI)
- Campos Personalizados para Jogos
  - Utilização do Advanced Custom Fields (ACF) para adicionar campos personalizados:
    - Pontuação
    - Comentários
    - Thumb do jogo (imagem)

### Fase 3: Desenvolvimento da Interface de Cadastro
- Interface de Cadastro no Backend
  - Customização do editor de posts para o CPT "Jogos" com os campos personalizados
- Interface de Cadastro no Frontend (opcional)
  - Criação de um formulário no frontend para permitir que usuários cadastrem jogos

### Fase 4: Exibição dos Jogos
- Template para Exibição dos Jogos
  - Criação de templates no tema para exibir jogos cadastrados
  - Exibição de campos personalizados nos templates
- Listagem e Pesquisa de Jogos
  - Criação de páginas de listagem de jogos
  - Implementação de funcionalidade de pesquisa e filtros

### Fase 5: Adição de Funcionalidades Extras
- Sistema de Pontuação
  - Permitir que usuários atribuam pontuações aos jogos
- Sistema de Comentários
  - Implementar sistema de comentários para cada jogo
- Exibição de Thumbs dos Jogos
  - Exibir imagem de thumb dos jogos em listas e páginas individuais

### Fase 6: Integrações e Melhorias Futuras
- Integração com API da Steam
  - Puxar dados de jogos da Steam e sincronizar com o banco de dados
- Comparação de Jogos com Amigos
  - Implementar comparação de listas de jogos com amigos
- Outras Melhorias
  - Adicionar novas funcionalidades conforme feedback dos usuários
- Fonte de informações:
  - Algumas bases de dados e serviços que catalogam jogos de maneira mais específica, como:
  - IGDB (Internet Game Database): Um banco de dados que fornece informações detalhadas sobre jogos, incluindo desenvolvedores, editores, datas de lançamento e muito mais.
  - MobyGames: Um banco de dados abrangente que lista jogos e suas versões, plataformas, desenvolvedores, editores e outros detalhes relevantes.
  - Steam: A plataforma de distribuição de jogos da Valve fornece informações detalhadas sobre os jogos disponíveis na plataforma, incluindo identificadores únicos.
  - Giant Bomb: Outro banco de dados que oferece informações detalhadas sobre jogos de videogame.
  - Barcodes: Para versões físicas dos jogos, os códigos de barras UPC e EAN são usados para identificação e rastreamento.

## Tecnologias Utilizadas
- WordPress
- Advanced Custom Fields (ACF)
- Custom Post Type UI
- WP-PostRatings (ou plugin similar)

## Metodologia
O projeto é desenvolvido utilizando a metodologia Ágil, com iterações curtas e incrementais para incorporar feedback contínuo dos usuários e stakeholders.

## Como Contribuir
Se você deseja contribuir com o projeto, siga os passos abaixo:
1. Faça um fork do repositório.
2. Crie uma branch para sua feature (`git checkout -b feature/MinhaFeature`).
3. Commit suas mudanças (`git commit -m 'Adiciona minha feature'`).
4. Envie para o branch (`git push origin feature/MinhaFeature`).
5. Abra um Pull Request.

## Licença
Este projeto está licenciado sob a [MIT License](LICENSE).

## Contato
Para mais informações, entre em contato através do email [weboss@gmail.com](mailto:weboss@gmail.com).
