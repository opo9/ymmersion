<?php
$menu1 = wp_get_nav_menu_items("Menu1");
$menuId = wp_get_nav_menu_object("Options")->term_id;
$menu = get_term($menuId, 'nav_menu');
$menulogo = get_field('logo', $menu);

?>

<header class="flex items-center justify-between px-20 py-4 bg-primary">
  <!-- Logo -->
  <div class="flex justify-center items-center">
    <a href="<?php echo home_url() ?>">
      <img class="w-[127px] h-auto" src="<?php echo esc_url($menulogo['url']); ?>"
        alt="<?php echo esc_attr($menulogo['alt']); ?>" title="<?php echo esc_attr($menulogo['title']); ?>"
        loading="lazy"> </a>
  </div>

  <!-- Right Section: Navigation Links, Contact Button & WhatsApp Icon -->
  <div class="flex items-center space-x-8 text-lg font-medium text-white">
    <?php
    foreach ($menu1 as $item) {
      echo '<a href="' . esc_url($item->url) . '" title="' . esc_attr($item->attr_title) . '" class="hover:text-gray-400">' . esc_html($item->title) . '</a>';
    }
    ?>
    <div class="flex space-x-4 px-5 items-center">
      <!-- Contact Button -->
      <button class="bg-white text-black font-semibold border-none px-14 py-4 rounded-full cursor-pointer">
        Contact
      </button>

      <!-- WhatsApp Icon -->
      <a href="https://wa.me/yourwhatsapplink" target="_blank" class="text-white">
        <div class="flex justify-center items-center bg-transparent border border-white text-white rounded-full">
          <i class="fab fa-whatsapp fa-2xl"></i>
        </div>
      </a>
    </div>
  </div>
</header>