<?php
/* Template Name: Page listing chevaux */
get_header();
get_template_part('parts/header');

// Récupération des filtres et du terme de recherche
$age = isset($_GET['age']) ? intval($_GET['age']) : '';
$taille = isset($_GET['taille']) ? intval($_GET['taille']) : '';
$prix = isset($_GET['prix']) ? intval($_GET['prix']) : '';
$reference = isset($_GET['reference']) ? sanitize_text_field($_GET['reference']) : '';
$nom = isset($_GET['nom']) ? sanitize_text_field($_GET['nom']) : '';
$search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

// Arguments de la requête pour les chevaux avec pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'chevaux',
    'posts_per_page' => 9,
    'paged' => $paged,
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'ASC',
    'meta_query' => array(
        'relation' => 'AND',
    ),
);

// Ajout des filtres aux arguments
if (!empty($age)) {
    $args['meta_query'][] = array(
        'key' => 'cheval_age',
        'value' => $age,
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
}

if (!empty($taille)) {
    $args['meta_query'][] = array(
        'key' => 'cheval_taille',
        'value' => $taille,
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
}

if (!empty($prix)) {
    $args['meta_query'][] = array(
        'key' => 'cheval_prix',
        'value' => $prix,
        'compare' => '<=',
        'type' => 'NUMERIC',
    );
}

if (!empty($reference)) {
    $args['meta_query'][] = array(
        'key' => 'cheval_reference',
        'value' => $reference,
        'compare' => 'LIKE',
    );
}

if (!empty($nom)) {
    $args['meta_query'][] = array(
        'key' => 'cheval_nom',
        'value' => $nom,
        'compare' => 'LIKE',
    );
}

// Ajout du champ de recherche global
if (!empty($search_term)) {
    $args['meta_query'][] = array(
        'relation' => 'OR',
        array(
            'key' => 'cheval_nom',
            'value' => $search_term,
            'compare' => 'LIKE',
        ),
        array(
            'key' => 'cheval_reference',
            'value' => $search_term,
            'compare' => 'LIKE',
        ),
        array(
            'key' => 'cheval_description',
            'value' => $search_term,
            'compare' => 'LIKE',
        ),
        array(
            'key' => 'cheval_prix',
            'value' => $search_term,
            'compare' => '<=',
            'type' => 'NUMERIC',
        ),
    );
}

// Exécution de la requête
$chevaux = new WP_Query($args); // Requête pour récupérer les chevaux

?>

<?php if ($chevaux->have_posts()) : ?>
<main class="chevaux-container">
    <?php get_template_part('parts/banner');?>

    <div class="chevaux-list">
        <div class="title">
            <?php echo get_field("titre"); ?>
        </div>

        <div class="filters">
            <form method="GET">
                <div class="price">
                    <label for="prix">Prix Maximum</label>

                    <div class="values">
                        <div id="prixValue"><?php echo esc_attr($prix); ?></div>
                        <div class="maxPrice">100000€</div>
                    </div>

                    <input type="range" id="prix" name="prix" min="0" max="100000" step="1"
                           value="<?php echo esc_attr($prix); ?>"
                           oninput="document.getElementById('prixValue').textContent = this.value"/>
                </div>

                <div>
                    <label for="age">Âge Maximum</label>
                    <input type="number" id="age" placeholder="age" name="age" value="<?php echo esc_attr($age); ?>"/>
                </div>

                <div>
                    <label for="taille">Taille Maximum</label>
                    <input type="number" id="taille" placeholder="taille" name="taille"
                           value="<?php echo esc_attr($taille); ?>"/>
                </div>

                <div>
                    <label for="reference">Référence</label>
                    <input type="text" id="reference" placeholder="reference" name="reference"
                           value="<?php echo esc_attr($reference); ?>"/>
                </div>

                <div>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" placeholder="nom" name="nom" value="<?php echo esc_attr($nom); ?>"/>
                </div>

                <div>
                    <label for="s">Recherche globale</label>
                    <input type="text" id="s" placeholder="Recherche" name="s"
                           value="<?php echo esc_attr($search_term); ?>"/>
                </div>

                <button class="btn button-dark" type="submit">Filtrer</button>
                <button class="btn button-dark" type="button" onclick="resetFilters()">Vider les filtres</button>
            </form>
        </div>

        <div class="chevaux">
            <?php while ($chevaux->have_posts()) : $chevaux->the_post(); ?>
                <?php $cheval = get_field("cheval"); ?>
                <div class="cheval-item">
                    <div class="img">
                        <img class="w-20" src="<?= $cheval["image"]["url"] ?>" alt="<?= $cheval["image"]["alt"] ?>">
                    </div>

                    <div class="data-container">
                        <div class="top">
                            <div class="name"><?php echo $cheval["nom"]; ?></div>
                            <div class="reference"><?php echo $cheval["reference"]; ?></div>
                        </div>

                        <div class="mid">
                            <div>Age : <?php echo $cheval["age"]; ?></div>
                            <div>Taille : <?php echo $cheval["taille"]; ?></div>
                            <div>Race : <?php echo $cheval["race"]; ?></div>
                        </div>

                        <div class="bottom">
                            <div class="price"><?php echo $cheval["prix"]; ?></div>
                            <div class="btn button-dark">voir plus</div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>


        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $chevaux->max_num_pages,
                'current' => $paged,
            ));
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>Aucun cheval trouvé.</p>
        <?php endif; ?>

    </div>
</main>

<?php get_template_part('parts/footer'); ?>
