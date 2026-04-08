<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f3f3f3;
}

.slider {
    width: 70%;
    max-width: 800px;
    height: 400px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    position: relative;
}

.slides {
    width: 500%;
    height: 100%;
    display: flex;
}

.slides input {
    display: none;
}

.slide {
    width: 20%;
    transition: 0.6s;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.navigation-auto {
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: -40px;
}

.navigation-auto div {
    border: 2px solid #fff;
    padding: 5px;
    border-radius: 10px;
    transition: 1s;
}

.navigation-auto div:not(:last-child) {
    margin-right: 10px;
}

#radio1:checked ~ .first {
    margin-left: 0;
}

#radio2:checked ~ .first {
    margin-left: -20%;
}

#radio3:checked ~ .first {
    margin-left: -40%;
}

#radio4:checked ~ .first {
    margin-left: -60%;
}

#radio5:checked ~ .first {
    margin-left: -80%;
}

.navigation-manual {
    position: absolute;
    width: 100%;
    margin-top: -60px;
    display: flex;
    justify-content: center;
}

.manual-btn {
    border: 2px solid #fff;
    padding: 5px;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.6s;
}

.manual-btn:not(:last-child) {
    margin-right: 10px;
}

.manual-btn:hover {
    background: #fff;
}
    </style>
</head>
<body>
    <div class="slider">
        <div class="slides">
            <!-- Radio buttons for navigation -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <input type="radio" name="radio-btn" id="radio5">

            <!-- Slide images -->
            <div class="slide first">
                <img src="image/img-1_73f531ca-ace8-42e4-88b0-7a8de5d93d7e.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="image/img-2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="image/img-3.jpg" alt="Image 3">
            </div>
            <div class="slide">
                <img src="image/img-4-1.jpg" alt="Image 4">
            </div>
            <div class="slide">
                <img src="image/img-2.jpg" alt="Image 5">
            </div>

            <!-- Automatic navigation -->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
                <div class="auto-btn5"></div>
            </div>
        </div>

        <!-- Manual navigation -->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
            <label for="radio5" class="manual-btn"></label>
        </div>
    </div>

    <script>
        let counter = 1;
            setInterval(() => {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 5) {
                    counter = 1;
                }
            }, 5000); // Change image every 5 seconds
                </script>
</body>
</html>