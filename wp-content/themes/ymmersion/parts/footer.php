<?php
$menu1 = wp_get_nav_menu_items("Menu1");
$menu2 = wp_get_nav_menu_items("Menu2");
$menuId = wp_get_nav_menu_object("Options")->term_id;
$menu = get_term($menuId, 'nav_menu');
$menulogo = get_field('logo', $menu);
$menuReseaux = get_field('reseaux', $menu);

?>

<footer class="relative text-white py-10 px-20 bg-no-repeat bg-cover bg-position-custom"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/png/image.png');">
  <!-- Superposition verte avec opacité -->
  <div class="absolute inset-0 bg-primary opacity-80"></div>

  <!-- Contenu du footer -->
  <div class="relative grid grid-cols-4 gap-10 py-10 px-20 z-10">
    <!-- Section 1: Logo et informations de contact -->
    <div>
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
      <p><strong>Adresse :</strong> 77 Rue Val d’arros 65350 Cabanac</p>
      <p><strong>Horaires :</strong> Lun - Dim 9h / 18h</p>
      <p><strong>Mail :</strong> email@mail.fr</p>
      <p><strong>Téléphone :</strong> 04.92.65.71.34</p>
    </div>
    <div>
      <h4 class="font-bold mb-4">Menu</h4>
      <ul>
        <?php
        foreach ($menu1 as $item) {
          echo '<li><a href="' . esc_url($item->url) . '" title="' . esc_attr($item->attr_title) . '" class="hover:text-gray-400">' . esc_html($item->title) . '</a></li>';
        }
        ?>
      </ul>
    </div>
    <div>
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
    <div>
      <h4 class="font-bold mb-4">Nous suivre</h4>
      <ul class="space-y-4">
        <?php foreach ($menuReseaux as $reseau): ?>
          <?php if (!empty($reseau['image']) || !empty($reseau['lien'])): ?>
            <li class="flex items-center space-x-4">
              <img class="w-8" height="auto" src="<?php echo esc_url($reseau['image']['url']); ?>"
                alt="<?php echo esc_attr($reseau['image']['alt']); ?>"
                title="<?php echo esc_attr($reseau['image']['title']); ?>" loading="lazy">
              <span>
                <a href="<?php echo esc_url($reseau['lien']['url']); ?>"
                  title="<?php echo esc_attr($reseau['lien']['title']); ?>"
                  target="<?php echo esc_attr($reseau['lien']['target']); ?>" class="hover:text-gray-400">
                  <?php echo esc_html($reseau['lien']['title']); ?>
                </a>
              </span>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>
</footer>