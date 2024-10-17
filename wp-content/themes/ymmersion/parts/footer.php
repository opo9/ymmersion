<?php
$menu1 = wp_get_nav_menu_items("Menu1");
$menu2 = wp_get_nav_menu_items("Menu2");
$menuId = wp_get_nav_menu_object("Options")->term_id;
$menu = get_term($menuId, 'nav_menu');
$menulogo = get_field('logo', $menu);

$contact = get_field('contact', $menu);
$blackIcons = false;
?>

<footer class="relative text-white py-10 px-20 bg-no-repeat bg-cover bg-position-custom"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/png/image.png');">
  <!-- Superposition verte avec opacité -->
  <div class="absolute inset-0 bg-primary opacity-80"></div>

  <!-- Contenu du footer -->
  <div class="relative grid grid-cols-10 gap-10 py-10 px-20 z-10">
    <!-- Section 1: Logo et informations de contact -->
    <div class="col-span-4">
      <!-- Logo -->
      <div class="mb-4">
        <!-- Remplacez cela par le logo réel -->
        <a class="block" href="<?php echo home_url() ?>">
          <img class="w-[127px] h-auto" src="<?php echo esc_url($menulogo['url']); ?>"
            alt="<?php echo esc_attr($menulogo['alt']); ?>" title="<?php echo esc_attr($menulogo['title']); ?>"
            loading="lazy">
        </a>
      </div>
      <!-- Informations de contact -->
      <ul class="space-y-5">
        <li><strong>Adresse :</strong> <?= $contact["adresse"] ?></li>
        <li><strong>Horaires :</strong> <?= $contact["horaires"] ?></li>
        <li><strong>Mail :</strong> <?= $contact["mail"] ?></li>
        <li><strong>Téléphone :</strong> <?= $contact["telephone"] ?></li>
      </ul>

    </div>
    <div class="col-span-2">
      <h4 class="font-bold mb-4">Menu</h4>
      <ul>
        <?php
        foreach ($menu1 as $item) {
          echo '<li><a href="' . esc_url($item->url) . '" title="' . esc_attr($item->attr_title) . '" class="hover:text-gray-400">' . esc_html($item->title) . '</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="col-span-2">
      <h4 class="font-bold mb-4">Liens</h4>
      <ul>
        <?php
        foreach ($menu2 as $item) {
          echo '<li><a href="' . esc_url($item->url) . '" title="' . esc_attr($item->attr_title) . '" class="hover:text-gray-400">' . esc_html($item->title) . '</a></li>';
        }
        ?>
      </ul>
    </div>

    <!-- Section 4: Suivez-nous -->
    <div class="col-span-2">
      <h4 class="font-bold mb-4">Nous suivre</h4>

      <?php include "socialmedia.php"; ?>
    </div>
  </div>
</footer>