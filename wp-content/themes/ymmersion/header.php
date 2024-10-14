<!doctype html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title>Page <?php echo get_the_title(); ?> des Ecuries du Pouey</title>
    <?php wp_head(); ?>
    <meta property="og:image" content="<?php echo get_template_directory_uri() . '/assets/images/png/logo-social.png'; ?>">
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>