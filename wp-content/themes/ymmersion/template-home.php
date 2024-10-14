<?php
/* Template Name: Page d'accueil */
get_header();
get_template_part('parts/header');
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <main class="home bg-yellow-500">
            Home page
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('parts/footer'); ?>
