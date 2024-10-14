<?php
get_header();
get_template_part('parts/header');
?>
    <main class="not-found">
        <h1>Cette page n'existe pas</h1>
        <p>La page que vous recherchez n'a pas été trouvée. Vous pouvez retourner à <a href="/">la page d'accueil</a> ou explorer nos autres sections.</p>

        <div class="img-container">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/png/not-found.png'; ?>" alt="computer with text as follow: 'Not Found Page'"/>
        </div>
    </main>
<?php
get_template_part('parts/footer');
?>