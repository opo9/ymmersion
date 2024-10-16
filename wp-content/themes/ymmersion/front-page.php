<?php
/* Template Name: Page d'accueil */
get_header();
get_template_part('parts/header');

$args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'post_status' => 'publish',
    'order' => 'ASC',
);

$servicesPost = new WP_Query($args);
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <main class="home bg-background ">
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
                
             <div class="wysiwyg--custom"><?= $valeurs["titre"]?></div>
                <div class="flex justify-between ">
                <?php foreach($valeurs["liste"] as $valeur): ?>
                    <div class="flex flex-col items-center">
                        <img class="w-20" src="<?= $valeur["image"]["url"] ?>" alt="<?= $valeur["image"]["alt"] ?>">
                        <p><?= $valeur["titre"]?></p>
                  
                    </div>
                <?php endforeach; ?>
                </div>
            </section>
            <!--  Chevaux à vendre -->
            <section class="bg-background ">
                <?php $elements = get_field('chevaux_a_vendre'); ?>
                
                <!-- <?= var_dump($chevaux_a_vendre) ?> -->
                 <div class="flex">
                    <?php $droite = $elements["droite"] ?>

                     <img class="w-1/2 brightness-75" src="<?= $elements["gauche"]["image"]["url"] ?>" alt="<?= $elements["gauche"]["image"]["alt"] ?>">
                     <div class="bg-primary w-1/2 text-white p-20 ">
                        <h2 ><?= $droite["titre"]?></h2>
                        <p class="text-left mt-5"><?= $droite["description"]?></p>
                        <div class="mt-20">
                            <!-- Bouton -->
                        <a class="bg-button p-btn rounded-2xl text-black" href=<?=$droite["bouton"]["url"]?> ><?= $droite["bouton"]["title"]?></a>
                        <div>
            </div>
                     </div>
                     
                 </div>
            </section>
          <!-- Services -->
          <section class="p-20 space-y-8">
            <h2 class="text-center"></h2>
     

            <?php if ($servicesPost->have_posts()) : ?>
    <div class="flex flex-col text-black space-y-5 w-[600px] m-auto">
    <?php $services = get_field('services');?>

        <h2 class="text-center text-3xl font-bold "><?= $services["titre"]?></h2>
    <div class="text-white flex justify-between gap-10 ">
        <?php $count = 0; ?>
        <?php while ($servicesPost->have_posts()) : $servicesPost->the_post(); ?>
            <?php if ($count >= 3) break; ?>
            
                <?php if (have_rows('service')) : ?>
                    <?php while (have_rows('service')) : the_row(); ?>
                        <a class="w-1/3" href=<?= the_sub_field("url")?>  alt=<?= the_sub_field("url")?>>
                        <div class="flex flex-col justify-between h-24 p-4 <?php
                             if ($count === 0) {
                                echo 'bg-secondary';
                            } elseif ($count === 1) {
                                echo 'bg-primary';
                            } elseif ($count === 2) {
                                echo 'bg-tertiary';
                            };
                        ?>">
                        <?= the_sub_field('titre');?>
                        <img class="ml-auto w-5 h-auto" src="/wp-content/themes/ymmersion/assets/images/svg/arrow.svg" alt="arrow" loading="lazy">
                        </div>
                </a>
                    <?php endwhile; ?>
                <?php endif; ?>

            <?php $count++; ?>
        <?php endwhile; ?>
    </div>
    <!-- Lien services -->
    <a class="ml-auto flex items-center underline cursor-pointer"><?= $services["lien"]["title"]?>
  
   >

</a>
    </div>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>Aucun service trouvé.</p>
<?php endif; ?>
        </section>
    </main>
<?php endwhile; endif; ?>

<?php get_template_part('parts/footer'); ?>
