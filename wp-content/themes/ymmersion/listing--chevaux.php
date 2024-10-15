<?php
/* Template Name: Page listing chevaux */
get_header();
get_template_part('parts/header');

// Arguments de la requête pour les chevaux
$args = array(
    'post_type' => 'chevaux',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'ASC',
);

$chevaux = new WP_Query($args); // Requête pour récupérer les chevaux
?>

<?php if ($chevaux->have_posts()) : ?>
    <main class="chevaux-list">
        <?php while ($chevaux->have_posts()) : $chevaux->the_post(); ?>
            <div class="cheval-item">
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo get_field("titre"); // Assurez-vous que ce champ personnalisé existe ?></p>
            </div>
        <?php endwhile; ?>
    </main>
    <?php wp_reset_postdata(); // Remet à zéro la requête post après la boucle personnalisée ?>
<?php else : ?>
    <p>Aucun cheval trouvé.</p>
<?php endif; ?>

<?php get_template_part('parts/footer'); ?>