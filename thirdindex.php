<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attractive Image Page with Hover Effects</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .fiveimagepage {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 20px;
    }

    .first-4divimage {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width: 48%;
    }

    .first-4divimage div, .second-1divimage {
      position: relative;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .first-4divimage div {
      width: 48%;
    }

    .second-1divimage {
      width: 48%;
    }

    .first-4divimage img, .second-1divimage img {
      width: 100%;
      height: 100%;
      transition: transform 0.5s ease, opacity 0.5s ease;
    }

    .first-4divimage div:hover img, .second-1divimage:hover img {
      transform: scale(1.1);
      opacity: 0.5;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: rgba(0, 0, 0, 0);
      transition: background 0.5s ease;
    }

    .first-4divimage div:hover .overlay, .second-1divimage:hover .overlay {
      background: rgba(0, 0, 0, 0.5);
    }

    .overlay h2, .overlay button {
      color: white;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .first-4divimage div:hover .overlay h2, .first-4divimage div:hover .overlay button,
    .second-1divimage:hover .overlay h2, .second-1divimage:hover .overlay button {
      opacity: 1;
    }

    .overlay button {
      padding: 10px 20px;
      border: none;
      background-color: #ff6600;
      color: white;
      cursor: pointer;
      margin-top: 10px;
    }

    .overlay button:hover {
      background-color: #ff4500;
    }
  </style>
</head>
<body>
  <div class="fiveimagepage">
    <div class="first-4divimage">
      <div class="first-image-In4image">
        <img src="image/gal1.jpg" alt="Image 1">
        <div class="overlay">
          <h2>Image 1</h2>
          <button>Read More</button>
        </div>
      </div>
      <div class="second-image-In4image">
        <img src="image/gal2.jpg" alt="Image 2">
        <div class="overlay">
          <h2>Image 2</h2>
          <button>Read More</button>
        </div>
      </div>
      <div class="third-image-In4image">
        <img src="image/gal3.jpg" alt="Image 3">
        <div class="overlay">
          <h2>Image 3</h2>
          <button>Read More</button>
        </div>
      </div>
      <div class="four-image-In4image">
        <img src="image/gal4.jpg" alt="Image 4">
        <div class="overlay">
          <h2>Image 4</h2>
          <button>Read More</button>
        </div>
      </div>
    </div>
    <div class="second-1divimage">
      <img src="image/gal5.jpg" alt="Image 5">
      <div class="overlay">
        <h2>Image 5</h2>
        <button>Read More</button>
      </div>
    </div>
  </div>
</body>
</html>