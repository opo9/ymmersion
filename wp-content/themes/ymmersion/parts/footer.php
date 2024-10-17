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
      <ul class="space-y-7">
        <li>
          <strong>Adresse :</strong> 
          <a target="_blank" class="hover:underline"  href="https://www.google.com/maps/place/Du+Pouey/@43.268344,0.226641,17z/data=!4m6!3m5!1s0x12a9c9365c8f3e87:0xd0bafca218a5ae92!8m2!3d43.268344!4d0.2266413!16s%2Fg%2F1tsgyws9?hl=en&entry=ttu&g_ep=EgoyMDI0MTAxNC4wIKXMDSoASAFQAw%3D%3D">
            <?= $contact["adresse"] ?>
</a>
        </li>
        <li>
          <strong>Horaires :</strong>
           <?= $contact["horaires"] ?>
        </li>
        <li>
          <strong>Mail :</strong> 
          <a class="hover:underline" href="mailto:<?=$infos["mail"]?>" >
                                    <?= $contact["mail"] ?>
                                </a>
        </li>
        <li>
          <strong>Téléphone :</strong> 
          <a class="hover:underline" href="tel:<?=$infos["telephone"]?>">
                                    <?= $contact["telephone"] ?>
                                </a>
        </li>
      </ul>

    </div>
    <div class="col-span-2">
      <h4 class="font-bold mb-4">Menu</h4>
      <ul class="space-y-7">
        <?php
        foreach ($menu1 as $item) {
          echo '<li><a href="' . esc_url($item->url) . '" title="' . esc_attr($item->attr_title) . '" class="hover:text-gray-400">' . esc_html($item->title) . '</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="col-span-2">
      <h4 class="font-bold mb-4">Liens</h4>
      <ul class="space-y-7">
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