<section class="relative flex justify-between pl-20 pt-10 h-[600px] bg-primary  text-white">
  <?php $banniere = get_field('banniere'); ?>
  <div class="w-1/2 space-y-24" >
    <p>Accueil > Contact</p>
    <h1>
      <?= $banniere["titre"] ?>
    </h1>
    <h3>
      <?= $banniere["description"] ?>
    </h3>
  </div>
  <div class="flex gap-10  ">
    <img class="relative w-[360px] h-[490px] -bottom-24" src=<?= $banniere["image1"]["url"] ?> alt=<?= $banniere["image1"]["url"] ?>>
    <img class="w-[320px] h-[490px] object-cover" src=<?= $banniere["image2"]["url"] ?> alt=<?= $banniere["image2"]["url"] ?>>
  </div>
</section>