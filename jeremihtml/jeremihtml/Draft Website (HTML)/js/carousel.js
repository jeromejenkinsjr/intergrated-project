document.addEventListener('DOMContentLoaded', function() {
  function setupCarousel(carouselClass) {
      const carousels = document.querySelectorAll(carouselClass);

      carousels.forEach(function(carousel) {
          const prevBtn = carousel.querySelector('.prev');
          const nextBtn = carousel.querySelector('.next');
          const items = carousel.querySelector('.carousel__items');
          let currentIndex = 0;
          let intervalId;

          function showSlide(index) {
              items.style.transform = `translateX(-${index * 100}%)`;
          }

          function nextSlide() {
              currentIndex = (currentIndex + 1) % items.children.length;
              showSlide(currentIndex);
          }

          function prevSlide() {
              currentIndex = (currentIndex - 1 + items.children.length) % items.children.length;
              showSlide(currentIndex);
          }

          function startAutoScroll() {
              intervalId = setInterval(nextSlide, 4000); // Change 2000 to the desired interval in milliseconds (e.g., 5000 for 5 seconds)
          }

          function stopAutoScroll() {
              clearInterval(intervalId);
          }

          nextBtn.addEventListener('click', function() {
              nextSlide();
              stopAutoScroll(); // Stop auto-scroll when user clicks next button
          });

          prevBtn.addEventListener('click', function() {
              prevSlide();
              stopAutoScroll(); // Stop auto-scroll when user clicks prev button
          });

          startAutoScroll(); // Start auto-scroll when page loads
      });
  }

  // Call the setupCarousel function for carousels with the same class
  setupCarousel('.carousel');
});
