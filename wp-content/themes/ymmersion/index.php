<?php
get_header();
get_template_part('parts/header');
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_template_part('parts/footer'); ?>