<?php
/* Template Name: Page de contact */
get_header();
get_template_part('parts/header');

$contact = get_field("contact");

$menuId = wp_get_nav_menu_object("Options")->term_id;
$menu = get_term($menuId, 'nav_menu');
$infos = get_field('contact', $menu);

$blackIcons = true;

?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <main class="bg-background">
          <?= get_template_part("/parts/banner")?>
        <div class="py-24 px-64 space-y-32 ">

          <section >
          <h2><?= $contact["titre"]?></h2>
          <div class="flex justify-center my-5">
          <form class="contact-form w-2/5 bg-white p-10">

<?= do_shortcode($contact["shortcode"]) ?>
<div class="w-3/5">
  <?= $contact["googlemap"]?>
</div>
</form>
          </div>
          </section>
          
          <section>
          <h2>Informations de contact</h2>

          <div class="flex my-14">


          <ul class="flex justify-between flex-wrap w-3/4">
            <li class="w-1/2"><strong class="block">Mail : </strong><?=$infos["mail"]?></li>
            <li class="w-1/2"><strong class="block">Téléphone : </strong><?=$infos["telephone"]?></li>
            <li class="w-1/2"><strong class="block" >Adresse : </strong><?=$infos["adresse"]?></li>
            <li class="w-1/2"><strong class="block">Horaires : </strong><?=$infos["horaires"]?></li>
          </ul>
          <div class="w-1/4">
            <?php include "parts/socialmedia.php" ?>
          </div>
          </div>
          </section>
          </div>

      </main>
       
  <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('parts/footer'); ?>
