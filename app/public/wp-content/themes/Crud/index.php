<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Itens</title>
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>

    <h1 style="color: #333; font-family: Arial, sans-serif;">Bem-vindo ao CRUD de Itens</h1>

    <div style="border-radius: 5px; background-color: #f2f2f2; padding: 40px; font-family: Arial, sans-serif;">
        <h2 style="color: #333;">Criar um novo item</h2>
        <?php echo do_shortcode('[custom_form]'); ?>
    </div>

    <h2 style="color: #333; font-family: Arial, sans-serif;">Lista de itens</h2>
    <?php echo do_shortcode('[list_items]'); ?>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>
