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
          restartAutoScroll();
        }
  
        function prevSlide() {
          currentIndex = (currentIndex - 1 + items.children.length) % items.children.length;
          showSlide(currentIndex);
          restartAutoScroll();
        }
  
        function startAutoScroll() {
          intervalId = setInterval(nextSlide, 4000);
        }
  
        function stopAutoScroll() {
          clearInterval(intervalId);
        }
  
        function restartAutoScroll() {
          stopAutoScroll();
          setTimeout(startAutoScroll, 3000); // Restart auto-scroll after 3 seconds
        }
  
        nextBtn.addEventListener('click', function() {
          nextSlide();
          stopAutoScroll();
        });
  
        prevBtn.addEventListener('click', function() {
          prevSlide();
          stopAutoScroll();
        });
  
        startAutoScroll();
      });
    }
  
    setupCarousel('.carousel');
  });
  