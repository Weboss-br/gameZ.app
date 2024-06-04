<?php
if (!function_exists('custom_post_type')) {
    // Registrar tipo de post personalizado
    function custom_post_type() {
        $args = array(
            'public' => true,
            'label'  => 'Itens',
            'supports' => array('title', 'editor'),
        );
        register_post_type('item', $args);
    }
    add_action('init', 'custom_post_type');
}

// Função para exibir o formulário de criação de itens
if (!function_exists('custom_form')) {
    function custom_form() {
        if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == 'create_post') {
            if (isset($_POST['create_item_nonce_field']) && wp_verify_nonce($_POST['create_item_nonce_field'], 'create_item_nonce')) {
                $new_post = array(
                    'post_title'    => sanitize_text_field($_POST['title']),
                    'post_content'  => sanitize_text_field($_POST['content']),
                    'post_status'   => 'publish',
                    'post_type'     => 'item',
                );
                $post_id = wp_insert_post($new_post);
            } else {
                echo 'Falha na verificação de segurança. Tente novamente.';
            }
        }
        ?>
        <form action="" method="post">
            <?php wp_nonce_field('create_item_nonce', 'create_item_nonce_field'); ?>
            <label for="title">Título</label>
            <input type="text" id="title" name="title" required>
            
            <label for="content">Conteúdo</label>
            <textarea id="content" name="content" required></textarea>
            
            <input type="hidden" name="action" value="create_post">
            <input type="submit" value="Criar Item">
        </form>
        <?php
    }
    add_shortcode('custom_form', 'custom_form');
}

// Função para listar os itens
if (!function_exists('list_items')) {
    function list_items() {
        $args = array(
            'post_type' => 'item',
            'posts_per_page' => -1
        );
        $items = new WP_Query($args);

        if ($items->have_posts()) {
            while ($items->have_posts()) {
                $items->the_post();
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<p>' . get_the_content() . '</p>';
                echo '<a href="' . get_edit_post_link() . '">Editar</a>';
                echo '<form action="" method="post" style="display:inline;">
                        ' . wp_nonce_field('delete_post_nonce', '_wpnonce', true, false) . '
                        <input type="hidden" name="delete_post_id" value="' . get_the_ID() . '">
                        <input type="submit" value="Excluir">
                      </form>';
            }
        } else {
            echo 'Nenhum item encontrado.';
        }
        wp_reset_postdata();
    }
    add_shortcode('list_items', 'list_items');
}

// Função para processar exclusões
if (!function_exists('handle_post_actions')) {
    function handle_post_actions() {
        if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['delete_post_id'])) {
            if (isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'delete_post_nonce')) {
                $post_id = intval($_POST['delete_post_id']);
                wp_delete_post($post_id);
            } else {
                echo 'Falha na verificação de segurança. Tente novamente.';
            }
        }
    }
    add_action('init', 'handle_post_actions');
}
?>
