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
            <?= get_template_part("/parts/banner") ?>
            <div class="py-24 px-64 space-y-32 ">

                <section>
                    <h2><?= $contact["titre"] ?></h2>
                    <div class="flex justify-center my-5">
                        <div class="contact-form w-2/5 bg-white p-10">

                            <?= do_shortcode($contact["shortcode"]) ?>
                        </div>

                        <div class="w-3/5">
                        <iframe src="<?= $contact["googlemap"] ?>" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            
                        </div>
                    </div>
                </section>

                <section>
                    <h2>Informations de contact</h2>

                    <div class="flex my-14">


                        <ul class="flex justify-between flex-wrap w-3/4">
                            <li class="w-1/2 ">
                                <strong class="block">Mail : </strong>
                                <a class="hover:underline" href="mailto:<?=$infos["mail"]?>" >
                                    <?= $infos["mail"] ?>
                                </a>
                            </li>
                            <li class="w-1/2">
                                <strong class="block">Téléphone : </strong>
                                <a class="hover:underline" href="tel:<?=$infos["telephone"]?>">
                                    <?= $infos["telephone"] ?>
                                </a>
                            </li>
                            <li class="w-1/2">
                                <strong class="block">Adresse : </strong>
                                <a target="_blank" class="hover:underline"  href="https://www.google.com/maps/place/Du+Pouey/@43.268344,0.226641,17z/data=!4m6!3m5!1s0x12a9c9365c8f3e87:0xd0bafca218a5ae92!8m2!3d43.268344!4d0.2266413!16s%2Fg%2F1tsgyws9?hl=en&entry=ttu&g_ep=EgoyMDI0MTAxNC4wIKXMDSoASAFQAw%3D%3D">
                                    <?= $infos["adresse"] ?>
                                </a>
                            </li>
                            <li class="w-1/2"><strong class="block">Horaires : </strong><?= $infos["horaires"] ?></li>
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
