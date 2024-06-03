https://markmap.js.org/repl

# Roadmap do Projeto de Cadastro de Jogos em WordPress

## Fase 1: Configuração Inicial
- Instalação do WordPress
  - Configurar ambiente de desenvolvimento local
    - Escolher uma ferramenta de desenvolvimento local
      - XAMPP
      - Local by Flywheel
      - MAMP (para Mac)
      - WAMP (para Windows)
    - Instalar a ferramenta escolhida
      - Baixar e instalar o software
      - Configurar o servidor local (Apache, MySQL)
    - Criar um banco de dados para o WordPress
      - Acessar o phpMyAdmin
      - Criar um novo banco de dados
  - Instalar e configurar o WordPress
    - Baixar o WordPress
      - Ir ao site oficial (wordpress.org) e baixar a última versão
    - Configurar o wp-config.php
      - Inserir as informações do banco de dados
      - Configurar as chaves de segurança
    - Executar a instalação do WordPress
      - Acessar o instalador via navegador
      - Preencher os detalhes do site (nome, usuário, senha, email)
      - Concluir a instalação

- Configuração de Temas e Plugins
  - Escolher um tema base ou criar um tema filho
    - Escolher um tema base
      - Pesquisar e selecionar um tema do repositório oficial ou de terceiros
      - Instalar e ativar o tema escolhido
    - Criar um tema filho (opcional, mas recomendado)
      - Criar uma nova pasta no diretório de temas (`wp-content/themes`)
      - Criar um arquivo `style.css` com informações do tema filho
      - Criar um arquivo `functions.php` para enfileirar os estilos do tema pai
      - Ativar o tema filho no painel de administração
  - Instalar plugins essenciais
    - Plugins de SEO
      - Instalar e configurar o Yoast SEO ou Rank Math
    - Plugins de segurança
      - Instalar e configurar o Wordfence ou Sucuri
    - Plugins de cache
      - Instalar e configurar o W3 Total Cache ou WP Super Cache
    - Outros plugins úteis
      - Formulários de contato (Contact Form 7)
      - Backup (UpdraftPlus)
      - Otimização de imagens (Smush)



## Fase 2: Criação de Custom Post Types e Campos Personalizados
- Custom Post Type (CPT) para Jogos
  - Criar um CPT chamado "Jogos"
    - Usar código no arquivo `functions.php`
      - Adicionar o código para registrar o CPT "Jogos"
        ```php
        function create_post_type_jogos() {
            register_post_type('jogos',
                array(
                    'labels' => array(
                        'name' => __('Jogos'),
                        'singular_name' => __('Jogo')
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'supports' => array('title', 'editor', 'thumbnail')
                )
            );
        }
        add_action('init', 'create_post_type_jogos');
        ```
      - Personalizar os argumentos conforme necessário (por exemplo, `supports`, `taxonomies`)
    - Usar plugin Custom Post Type UI
      - Instalar e ativar o plugin
      - Navegar até "CPT UI" no painel de administração
      - Adicionar um novo post type chamado "Jogos"
      - Configurar as opções do CPT (nome, singular, plural, ícone, etc.)
      - Salvar e verificar se o CPT aparece no menu de administração

- Campos Personalizados para Jogos
  - Utilizar Advanced Custom Fields (ACF) para adicionar campos personalizados
    - Instalar e ativar o plugin ACF
    - Criar um novo grupo de campos personalizados
      - Navegar até "Custom Fields" > "Add New"
      - Nomear o grupo de campos (por exemplo, "Detalhes do Jogo")
      - Adicionar campos personalizados ao grupo
        - Pontuação
          - Tipo de campo: Number
          - Rótulo: Pontuação
          - Nome do campo: pontuacao
        - Comentários
          - Tipo de campo: Textarea
          - Rótulo: Comentários
          - Nome do campo: comentarios
        - Thumb do jogo (imagem)
          - Tipo de campo: Image
          - Rótulo: Thumb do Jogo
          - Nome do campo: thumb_jogo
      - Configurar as regras de localização
        - Post Type: Igual a "Jogos"
      - Publicar o grupo de campos
    - Verificar se os campos personalizados aparecem no editor de posts do CPT "Jogos"


## Fase 3: Desenvolvimento da Interface de Cadastro
- Interface de Cadastro no Backend
  - Customizar o editor de posts para o CPT "Jogos" com os campos personalizados
    - Verificar se os campos do ACF estão aparecendo no editor de posts do CPT "Jogos"
      - Navegar até "Jogos" no menu de administração
      - Adicionar novo jogo e verificar os campos personalizados (Pontuação, Comentários, Thumb do Jogo)
    - Adicionar metaboxes personalizados (opcional)
      - Utilizar hooks do WordPress para adicionar metaboxes
        ```php
        function custom_jogos_metabox() {
            add_meta_box(
                'jogos_details',
                'Detalhes do Jogo',
                'jogos_metabox_callback',
                'jogos',
                'normal',
                'high'
            );
        }
        add_action('add_meta_boxes', 'custom_jogos_metabox');

        function jogos_metabox_callback($post) {
            // Conteúdo da metabox
            echo 'Custom content here';
        }
        ```
    - Personalizar o layout do editor (opcional)
      - Utilizar CSS/JS para ajustar a aparência do editor

- Interface de Cadastro no Frontend (opcional)
  - Criar um formulário no frontend para permitir que usuários cadastrem jogos
    - Utilizar o plugin ACF para criar formulários no frontend
      - Criar uma nova página no WordPress
      - Adicionar um shortcode ACF para exibir o formulário de cadastro
        ```php
        echo do_shortcode('[acf_form post_id="new_post" field_groups="GROUP_ID" form="true" return="URL_TO_REDIRECT"]');
        ```
      - Configurar o shortcode:
        - `post_id="new_post"`: Para criar novos posts
        - `field_groups="GROUP_ID"`: ID do grupo de campos do ACF
        - `form="true"`: Para exibir o formulário
        - `return="URL_TO_REDIRECT"`: URL para redirecionar após o envio do formulário
    - Criar formulário manualmente (opcional)
      - Criar um template de página para exibir o formulário
        ```php
        <?php
        /* Template Name: Formulário de Cadastro de Jogos */
        get_header();

        if ($_POST) {
            $new_post = array(
                'post_title'    => sanitize_text_field($_POST['title']),
                'post_content'  => sanitize_textarea_field($_POST['content']),
                'post_status'   => 'pending',
                'post_type'     => 'jogos'
            );

            $post_id = wp_insert_post($new_post);

            if ($post_id) {
                update_field('field_1', $_POST['pontuacao'], $post_id);
                update_field('field_2', $_POST['comentarios'], $post_id);
                // Upload e anexar imagem
            }
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Título do Jogo">
            <textarea name="content" placeholder="Descrição"></textarea>
            <input type="number" name="pontuacao" placeholder="Pontuação">
            <textarea name="comentarios" placeholder="Comentários"></textarea>
            <input type="file" name="thumb_jogo">
            <input type="submit" value="Cadastrar Jogo">
        </form>
        <?php get_footer(); ?>
        ```
      - Processar os dados do formulário
        - Sanitizar e validar os dados
        - Inserir o novo post e atualizar campos personalizados

## Fase 4: Exibição dos Jogos
- Template para Exibição dos Jogos
  - Criar templates no tema para exibir jogos cadastrados
    - Criar um template `single-jogos.php` para exibir um único jogo
      ```php
      <?php get_header(); ?>
      
      <div class="jogo-single">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <h1><?php the_title(); ?></h1>
              <div class="jogo-thumb">
                  <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail('large'); ?>
                  <?php endif; ?>
              </div>
              <div class="jogo-content">
                  <?php the_content(); ?>
              </div>
              <div class="jogo-meta">
                  <p>Pontuação: <?php the_field('pontuacao'); ?></p>
                  <p>Comentários: <?php the_field('comentarios'); ?></p>
              </div>
          <?php endwhile; endif; ?>
      </div>
      
      <?php get_footer(); ?>
      ```
    - Adicionar estilos ao template (opcional)
      - Personalizar a aparência do template com CSS
  - Exibir campos personalizados nos templates
    - Utilizar funções do ACF para exibir campos personalizados
      - `the_field('field_name')` para exibir campos
      - `if (get_field('field_name'))` para verificar e exibir campos condicionais

- Listagem e Pesquisa de Jogos
  - Criar páginas de listagem de jogos
    - Criar um template `archive-jogos.php` para exibir a lista de jogos
      ```php
      <?php get_header(); ?>
      
      <div class="jogos-archive">
          <h1>Lista de Jogos</h1>
          <?php if (have_posts()) : ?>
              <ul class="jogos-list">
                  <?php while (have_posts()) : the_post(); ?>
                      <li>
                          <a href="<?php the_permalink(); ?>">
                              <h2><?php the_title(); ?></h2>
                              <div class="jogo-thumb">
                                  <?php if (has_post_thumbnail()) : ?>
                                      <?php the_post_thumbnail('thumbnail'); ?>
                                  <?php endif; ?>
                              </div>
                              <div class="jogo-meta">
                                  <p>Pontuação: <?php the_field('pontuacao'); ?></p>
                                  <p>Comentários: <?php the_field('comentarios'); ?></p>
                              </div>
                          </a>
                      </li>
                  <?php endwhile; ?>
              </ul>
          <?php else : ?>
              <p>Nenhum jogo encontrado.</p>
          <?php endif; ?>
      </div>
      
      <?php get_footer(); ?>
      ```
    - Adicionar estilos à lista de jogos (opcional)
      - Personalizar a aparência da lista com CSS

  - Implementar funcionalidade de pesquisa e filtros
    - Adicionar uma barra de pesquisa ao template de arquivo `archive-jogos.php`
      ```php
      <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <input type="hidden" name="post_type" value="jogos" />
          <input type="search" name="s" placeholder="Pesquisar jogos..." value="<?php echo get_search_query(); ?>" />
          <button type="submit">Pesquisar</button>
      </form>
      ```
    - Adicionar filtros por campos personalizados (opcional)
      - Utilizar WP_Query com meta_query para filtrar por campos personalizados
        ```php
        $args = array(
            'post_type' => 'jogos',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'pontuacao',
                    'value' => 8,
                    'compare' => '>='
                ),
                array(
                    'key' => 'comentarios',
                    'value' => 'excelente',
                    'compare' => 'LIKE'
                )
            )
        );
        $jogos_query = new WP_Query($args);

        if ($jogos_query->have_posts()) :
            while ($jogos_query->have_posts()) : $jogos_query->the_post();
                // Exibir os jogos filtrados
            endwhile;
            wp_reset_postdata();
        else :
            echo 'Nenhum jogo encontrado.';
        endif;
        ```

Este detalhamento fornece um guia passo a passo para criar templates de exibição de jogos, listar jogos e implementar funcionalidades de pesquisa e filtros no seu site WordPress. Se precisar de mais informações ou assistência em alguma etapa específica, estou à disposição!







## Fase 5: Adição de Funcionalidades Extras
- Sistema de Pontuação
  - Permitir que usuários atribuam pontuações aos jogos
    - Utilizar o plugin WP-PostRatings (ou similar)
      - Instalar e ativar o plugin WP-PostRatings
      - Configurar o plugin conforme as necessidades do site
        - Definir o tipo de pontuação (estrelas, números, etc.)
        - Configurar as opções de exibição
      - Adicionar o shortcode de pontuação ao template `single-jogos.php`
        ```php
        if (function_exists('the_ratings')) {
            the_ratings();
        }
        ```
      - Personalizar a aparência das pontuações com CSS (opcional)

- Sistema de Comentários
  - Implementar sistema de comentários para cada jogo
    - Utilizar o sistema de comentários nativo do WordPress
      - Certificar-se de que o suporte a comentários está ativado no CPT "Jogos"
        ```php
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
        ```
      - Adicionar a seção de comentários ao template `single-jogos.php`
        ```php
        <?php comments_template(); ?>
        ```
      - Personalizar a aparência dos comentários com CSS (opcional)
    - Utilizar plugins de comentários (opcional)
      - Instalar e ativar plugins como Disqus ou WPDiscuz
      - Configurar o plugin conforme as necessidades do site

- Exibição de Thumbs dos Jogos
  - Exibir imagem de thumb dos jogos em listas e páginas individuais
    - Certificar-se de que o suporte a thumbnails está ativado no CPT "Jogos"
      ```php
      'supports' => array('title', 'editor', 'thumbnail', 'comments')
      ```
    - Adicionar código para exibir a thumb do jogo nos templates
      - Template `single-jogos.php`
        ```php
        <div class="jogo-thumb">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>
        </div>
        ```
      - Template `archive-jogos.php`
        ```php
        <div class="jogo-thumb">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail'); ?>
            <?php endif; ?>
        </div>
        ```
      - Personalizar a aparência das thumbnails com CSS (opcional)

## Fase 6: Melhorias Futuras
- Integração com API da Steam
  - Puxar dados de jogos da Steam e sincronizar com o banco de dados
    - Obter chave de API da Steam
      - Criar uma conta de desenvolvedor na Steam
      - Obter a chave de API necessária
    - Configurar a integração com a API da Steam
      - Criar uma função para chamar a API da Steam e obter dados do usuário
        ```php
        function get_steam_games($steam_id, $api_key) {
            $url = "http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key={$api_key}&steamid={$steam_id}&format=json";
            $response = wp_remote_get($url);
            if (is_wp_error($response)) {
                return false;
            }
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
        ```
      - Sincronizar dados obtidos com o banco de dados do WordPress
        ```php
        function sync_steam_games($steam_id, $api_key) {
            $games = get_steam_games($steam_id, $api_key);
            if (!$games) {
                return;
            }
            foreach ($games['response']['games'] as $game) {
                // Verificar se o jogo já existe
                $existing_game = get_page_by_title($game['name'], OBJECT, 'jogos');
                if (!$existing_game) {
                    // Criar novo post do jogo
                    $new_post = array(
                        'post_title'    => $game['name'],
                        'post_content'  => '',
                        'post_status'   => 'publish',
                        'post_type'     => 'jogos'
                    );
                    $post_id = wp_insert_post($new_post);
                    // Adicionar campos personalizados
                    update_field('pontuacao', 0, $post_id);
                    update_field('comentarios', '', $post_id);
                    update_field('thumb_jogo', $game['img_logo_url'], $post_id);
                }
            }
        }
        ```

- Comparação de Jogos com Amigos
  - Implementar comparação de listas de jogos com amigos
    - Criar uma página ou template para comparação
      - Criar um shortcode ou template page para exibir a comparação
        ```php
        function compare_games_with_friends($user_steam_id, $friend_steam_id, $api_key) {
            $user_games = get_steam_games($user_steam_id, $api_key);
            $friend_games = get_steam_games($friend_steam_id, $api_key);
            if (!$user_games || !$friend_games) {
                return 'Erro ao obter dados da Steam.';
            }
            $common_games = array_intersect(
                array_column($user_games['response']['games'], 'appid'),
                array_column($friend_games['response']['games'], 'appid')
            );
            ob_start();
            echo '<h2>Jogos em Comum</h2><ul>';
            foreach ($common_games as $appid) {
                echo '<li>App ID: ' . $appid . '</li>';
            }
            echo '</ul>';
            return ob_get_clean();
        }
        add_shortcode('compare_games', 'compare_games_with_friends');
        ```
      - Adicionar o shortcode à página de comparação
        ```php
        [compare_games user_steam_id="YOUR_STEAM_ID" friend_steam_id="FRIEND_STEAM_ID" api_key="YOUR_API_KEY"]
        ```

- Outras Melhorias
  - Adicionar novas funcionalidades conforme feedback dos usuários
    - Coletar feedback dos usuários através de formulários ou comentários
      - Criar um formulário de feedback
        ```php
        <form method="post" action="">
            <textarea name="feedback" placeholder="Deixe seu feedback"></textarea>
            <input type="submit" value="Enviar">
        </form>
        ```
    - Priorizar melhorias baseadas no feedback
      - Analisar e categorizar feedback recebido
      - Implementar melhorias de acordo com as prioridades e recursos disponíveis
    - Manter o site atualizado com novas funcionalidades e correções
      - Atualizar regularmente plugins, temas e o núcleo do WordPress
      - Monitorar e resolver problemas de desempenho e segurança

## Fase 7: Testes e Lançamento
- Testes de Funcionalidade
  - Testar todas as funcionalidades no ambiente de desenvolvimento
- Testes de Usabilidade
  - Coletar feedback dos usuários e fazer ajustes
- Lançamento
  - Migrar para o servidor de produção
  - Lançar o site e promover


