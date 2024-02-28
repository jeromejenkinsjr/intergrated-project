document.addEventListener('DOMContentLoaded', function() {
    const indicator = document.getElementById('indicator');
    const content = document.getElementById('content');
  
    window.addEventListener('scroll', function() {
      const windowHeight = window.innerHeight;
      const contentHeight = content.offsetHeight;
      const scrollY = window.scrollY;
  
      const percentageScrolled = (scrollY / (contentHeight - windowHeight)) * 100;
      const indicatorWidth = Math.min(percentageScrolled, 100) + '%';
  
      indicator.style.width = indicatorWidth;
    });
  });
  