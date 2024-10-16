document.addEventListener("DOMContentLoaded", function () {
  const observer = new MutationObserver(function (mutationsList, observer) {
    mutationsList.forEach(function (mutation) {
      if (mutation.addedNodes.length > 0) {
        document.querySelectorAll(".sk_branding").forEach(function (element) {
          element.style.setProperty("display", "none", "important"); // Applique display none avec !important
        });
      }
    });
  });

  // Observe the entire document for changes
  observer.observe(document.body, { childList: true, subtree: true });

  const swiper = new Swiper("#slider-home", {
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 4000,
    },
    spaceBetween: 80,
    slidesPerView: "2.5",
    centeredSlides: true,
    centerInsufficientSlides: true,
    allowTouchMove: true,
    simulateTouch: true,
    pagination: {
      el: ".swiper-pagination", // Cible l'élément de pagination dans le HTML
      clickable: true, // Rendre les dots cliquables
    },
  });

  $("#slider-home").mouseenter(function () {
    swiper.autoplay.stop();
  });

  $("#slider-home").mouseleave(function () {
    swiper.autoplay.start();
  });
});
