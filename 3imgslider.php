<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto-Playing Image Slider</title>
  <style>
    .slider {
      width: 100%;
      overflow: hidden;
    }
    .slides {
      display: flex;
      transition: transform 1s ease-in-out;
      width: 50%;
      height: 400px;
    }
    .slides img {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="slider">
    <div class="slides">
      <img src="image/phono-slider-1.jpg" alt="Image 1">
      <img src="image/phono-slider-2.jpg" alt="Image 2">
      <img src="image/phono-slider-3.jpg" alt="Image 3">
      <img src="image/phono-slider-2.jpg" alt="Image 2">
      <img src="image/phono-slider-3.jpg" alt="Image 3">
      <img src="image/phono-slider-1.jpg" alt="Image 1">
      <img src="image/phono-slider-2.jpg" alt="Image 2">
      <img src="image/phono-slider-3.jpg" alt="Image 3">
      <img src="image/phono-slider-2.jpg" alt="Image 2">
      <img src="image/phono-slider-3.jpg" alt="Image 3">
    </div>
  </div>

  <script>
    let index = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slides img').length;

    function showNextSlide() {
      index = (index + 1) % totalSlides;
      slides.style.transform = `translateX(${-index * 100}%)`;
    }

    setInterval(showNextSlide, 3000);
  </script>
</body>
</html>