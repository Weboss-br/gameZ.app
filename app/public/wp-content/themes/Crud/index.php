<?php get_header(); ?>

<h1>Bem-vindo ao CRUD de Itens</h1>
<h2>Criar um novo item</h2>
<?php echo do_shortcode('[custom_form]'); ?>

<h2>Lista de itens</h2>
<?php echo do_shortcode('[list_items]'); ?>

<?php get_footer(); ?>
