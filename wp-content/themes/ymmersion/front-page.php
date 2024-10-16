<?php
/* Template Name: Page d'accueil */
get_header();
get_template_part('parts/header');
?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <main class="home bg-background">
            <!-- Bannière -->
            <section class="relative h-[524px]">
                <?php $banniere = get_field('banniere'); ?>
                <!-- Background Image (SVG) -->
                <img class="absolute inset-0 w-full h-full bg-no-repeat bg-cover hero-bg-position-custom"
                    style="background-image: url('<?= $banniere["background_image"]["url"] ?>" alt="Bannière SVG">
                <div class="z-10  inset-0 absolute bg-primary opacity-80"></div>
                <div class="relative flex flex-col justify-center h-full z-20 p-24 space-y-20">
                    <h1 class="text-white text-4xl font-bold"><?= $banniere["titre"] ?></h1>
                    <div>
                        <a class=" bg-button p-btn rounded-2xl " href=<?= $banniere["bouton"]["url"] ?>><?= $banniere["bouton"]["title"] ?></a>
                    </div>
                </div>
            </section>
            <!-- Nos Valeurs -->
            <section class="p-24 space-y-16 w-2/3 m-auto">
                <?php $valeurs = get_field('valeurs'); ?>
                <div class="wysiwyg--custom"><?= $valeurs["titre"] ?></div>
                <div class="flex justify-between ">
                    <?php foreach ($valeurs["liste"] as $valeur): ?>
                        <div class="flex flex-col items-center">
                            <img class="w-20" src="<?= $valeur["image"]["url"] ?>" alt="<?= $valeur["image"]["alt"] ?>">
                            <p><?= $valeur["titre"] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <!--  Chevaux à vendre -->
            <section class="bg-background">
                <?php $elements = get_field('chevaux_a_vendre'); ?>
                <div class="flex h-[400px]">
                    <?php $droite = $elements["droite"] ?>
                    <img class="w-1/2 object-cover" src="<?= $elements["gauche"]["image"]["url"] ?>"
                        alt="<?= $elements["gauche"]["image"]["alt"] ?>">
                    <div class="bg-primary w-1/2 text-white p-20 ">
                        <h2 class="text-white"><?= $droite["titre"] ?></h2>
                        <p class="text-left mt-5"><?= $droite["description"] ?></p>
                        <div class="mt-20">
                            <!-- Bouton -->
                            <a class="bg-button p-btn rounded-2xl text-black" href=<?= $droite["bouton"]["url"] ?>><?= $droite["bouton"]["title"] ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services -->
            <?php $services = get_field('services'); ?>
            <section class="p-20 space-y-8">
                <h2 class="text-center"><?= $services["titre"] ?></h2>

                <div class="text-white flex justify-between gap-10 w-max m-auto">

                    <!-- Gauche -->
                    <a href=<?= $services["liste"]["gauche"]["url"] ?> alt=<?= $services["liste"]["gauche"]["url"] ?>>
                        <div class="bg-secondary  h-20 w-48 p-4">
                            <?= $services["liste"]["gauche"]["title"] ?>
                        </div>
                    </a>

                    <!-- Milieu -->
                    <a href=<?= $services["liste"]["milieu"]["url"] ?> alt=<?= $services["liste"]["milieu"]["url"] ?>>
                        <div class="bg-primary  h-20 w-48 p-4">
                            <?= $services["liste"]["milieu"]["title"] ?>
                        </div>
                    </a>

                    <!-- Droite -->
                    <a href=<?= $services["liste"]["droite"]["url"] ?> alt=<?= $services["liste"]["droite"]["url"] ?>>
                        <div class="bg-tertiary  h-20 w-48 p-4">
                            <?= $services["liste"]["droite"]["title"] ?>
                        </div>
                    </a>
                </div>

            </section>


        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('parts/footer'); ?>