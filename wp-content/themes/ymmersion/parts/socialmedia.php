<?php 
$menuId = wp_get_nav_menu_object("Options")->term_id;
$menu = get_term($menuId, 'nav_menu');
$menuReseaux = get_field('reseaux', $menu);
$menuReseauxBlack = get_field('reseaux_black', $menu);

?>

<ul class="space-y-4">
        <?php foreach ($menuReseaux as $reseau): ?>
          <?php if (!empty($reseau['image']) || !empty($reseau['lien'])): ?>
           
            <?php $url = $blackIcons ? $menuReseauxBlack[strtolower($reseau["lien"]["title"])]["url"] : $reseau["image"]["url"] ?>

            <li class="flex items-center space-x-4">
              <img class="w-8" height="auto" src="<?php echo esc_url($url) ?>"
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