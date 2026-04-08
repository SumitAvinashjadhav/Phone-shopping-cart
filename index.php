<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="image/phono-slider-1.jpg" style="width:100%">
            
                <div class="image-heading">
                    <div class="first-heading1">
                        <label id="firsttxtheading">Zania Black Edition</label>
                    </div>
                    <div class="second-heading">
                        <h1 id="firstheadingtxt">CURVY BEVEL</h1>
                    </div>
                    <div class="second-heading-secondtxt">
                        <h1 id="secondheadingtxt" >DUAL AUDIO</h1>
                    </div>
                    
                    <div class="third-heading">
                        <button class="button1">Shop Now</button>
                    </div>
                </div>
            
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="image/phono-slider-2.jpg" style="width:100%">

        <div class="image-heading2">
                    <div class="first-heading1">
                        <label id="firsttxtheading-2page">4K Resolution</label>
                    </div>
                    <div class="second-heading">
                        <h1 id="firstheadingtxt-2page">Exclusive</h1>
                    </div>
                    <div class="second-heading-secondtxt">
                        <h1 id="secondheadingtxt-2page" >Steel Frame</h1>
                    </div>
                    
                    <div class="third-heading">
                        <button class="button1">Shop Now</button>
                    </div>
                </div>
        
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="image/phono-slider-3.jpg" style="width:100%">

                <div class="image-heading">
                    <div class="first-heading1">
                        <label id="firsttxtheading-3page">Delta Zertiga Processor</label>
                    </div>
                    <div class="second-heading">
                        <h1 id="firstheadingtxt-3page">Full Screen</h1>
                    </div>
                    <div class="second-heading-secondtxt">
                        <h1 id="secondheadingtxt-3page" >Display</h1>
                    </div>
                    
                    <div class="third-heading">
                        <button class="button1">Shop Now</button>
                    </div>
                </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
        </div>

        <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
        </script>

</body>
</html>
<?php
include("footer.php");
?>