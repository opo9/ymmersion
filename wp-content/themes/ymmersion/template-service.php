<?php
/* Template Name: Page Service */
get_header();
get_template_part('parts/header');

$args = array(
  'post_type' => 'services',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'post_status' => 'publish',
  'order' => 'ASC',
);

$services = new WP_Query($args);
?>

<?php if ($services->have_posts()): ?>
  <main>
    <?php while ($services->have_posts()):
      $services->the_post(); ?>
      <?php $service = get_field('service'); ?>
      <?php if ($service['type_affichage'] == 'texte'): ?>
        <section class="p-24">
          <div class="flex flex-col h-full px-56 z-20 space-y-20">
            <div>
              <div class="space-y-service">
                <h2><?= $service["titre"] ?></h2>
                <h4><?= $service["description"] ?></h4>
              </div>
              <div class="flex justify-end mt-8">
                <a href="<?php echo get_post_permalink(get_the_ID()) ?>" class="button-dark">En savoir plus</a>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
      <?php if ($service['type_affichage'] == 'image'): ?>
        <section class="h-[501px]">
          <div class="flex">
            <img class="w-1/2 object-cover" src="<?= $service["image"]["url"] ?>" alt="<?= $service["image"]["alt"] ?>">
            <div class="bg-tertiary w-1/2 text-white p-20 ">
              <div class="space-y-service">
                <h2><?= $service["titre"] ?></h2>
                <h4><?= $service["description"] ?></h4>
              </div>
              <div class="mt-20">
                <div class="flex justify-end mt-8">
                  <a href="<?php echo get_post_permalink(get_the_ID()) ?>" class="button-dark">En savoir plus</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
      <?php if ($service['type_affichage'] == 'image_padding'): ?>
        <section class="p-24">
          <div class="flex items-center justify-between px-56 z-20 space-y-20">
            <!-- Contenu texte -->
            <div class="w-1/2 pr-10">
              <div class="space-y-service">
                <h2><?= $service["titre"] ?></h2>
                <h4><?= $service["description"] ?></h4>
              </div>
              <div class="flex mt-8">
                <a href="<?php echo get_post_permalink(get_the_ID()) ?>" class="button-dark">En savoir plus</a>
              </div>
            </div>
            <!-- Image -->
            <div class="w-1/2 flex justify-end">
              <img class="object-cover w-[295px]" src="<?= $service["image"]["url"] ?>" alt="<?= $service["image"]["alt"] ?>">
            </div>
          </div>
        </section>
      <?php endif; ?>
    <?php endwhile; ?>
  </main>
<?php endif; ?>

<?php get_template_part('parts/footer'); ?>