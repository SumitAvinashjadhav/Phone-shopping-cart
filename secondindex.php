<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="secondindex.css">
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
    .fiveimagepage{
        width: 100%;
        height: 120vh;
        background-color: yellow;
        display: flex;
    }
    .first-4divimage{
        width: 100%;
        height: 120vh;
        background-color: red;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .second-1divimage{
        width: 50%;
        height: 120vh;
        background-color: black;
    }
    .first-4divimage div:hover img, .second-1divimage:hover img {
      
      opacity: 0.5;
      background: ;
    }
    
    .first-image-In4image{
        width: 50%;
        height: 60vh;
        background-color: black;
    }
    .second-image-In4image{
        width: 50%;
        height: 60vh;
        background-color: black;
    }
    .third-image-In4image{
        width: 50%;
        height: 60vh;
        background-color: black;
    }
    .four-image-In4image{
        width: 50%;
        height: 60vh;
        background-color: black;
    }

    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f5f5f5;
    color: #333;
}

.lose-yourselfDiv {
    position: relative;
    text-align: center;
    color: white;
}

.lose-yourselfDiv img {
    width: 100%;
    height: auto;
}

.firstContainer-heading-whiteDiv {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -20%);
    text-align: center;
}

.firstContainer-heading-whiteDiv label {
    font-size: 2rem;
    font-weight: bold;
}

.gray-text-div {
    margin-top: 1rem;
}

#gray-text {
    font-size: 1.2rem;
    color: #ccc;
}

.three-white-Divs {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
    position: absolute;
    margin-top: -292px;
    margin-left: 10%;
}

.first-white-div,
.second-white-div,
.third-white-div {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 0 1rem;
    padding: 1rem;
    width: 300px;
    text-align: center;

}

.number-heading-div {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.NumberDiv {
    background-color: #007bff;
    color: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
    margin-right: 10px;
    margin: auto;
}

.text-heading-div-tripplecamera {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 0.5rem;
}

.text-heading-para-div-tripplecamera {
    font-size: 1rem;
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.text-heading-div-button button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.text-heading-div-button button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.text-heading-div-button button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
}
    

    /* .lose-yourselfDiv{
        width: 100%;
        height: 100vh;
        background-color: deeppink;
    }
    .three-white-Divs{
        width: 100%;
        height: 50vh;
        background-color: ;
        position: absolute;
        margin-top: -320px;
        display: flex;
        justify-content: space-around;
    }
    .first-white-div{
        width: 28%;
        height: 50vh;
        background-color: white;
    }
    .second-white-div{
        width: 28%;
        height: 50vh;
        background-color: white;
    }
    .third-white-div{
        width: 28%;
        height: 50vh;
        background-color: white;
    }
    .firstContainer-heading-whiteDiv{
        margin-left: 18%;
        font-size: 34px;
        margin-top: -36%;
        font-family: sans-serif;
        letter-spacing: 5px;
        font-weight: 200;
        position: absolute;
        color: white;
    }
    .gray-text-div{
        font-size: 18px;
        color: gray;
        font-weight: 200;
        margin-left: 15px;
        margin-top: 15px;
    }
    .number-heading-div{
       
    }
    .number-heading-div {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.NumberDiv {
    background-color: #007bff; /* Primary blue color */
    color: white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    font-weight: bold;
    margin-right: 10px;
}

.text-heading-div-tripplecamera {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 0.5rem;
}

.text-heading-para-div-tripplecamera {
    font-size: 1rem;
    color: #666;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.text-heading-div-button button {
    background-color: #007bff; /* Primary blue color */
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.text-heading-div-button button:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.05);
}

.text-heading-div-button button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5); /* Focus ring */
} */
   </style>
</head>
<body>
    <div class="white-background">
        <div class="firstContainer-heading">
            <label>WHAT MAKES THE ESSENTIAL DIFFERENT?</label><br>
            <label id="gray-text">EXPERIENCE HIGH PERFORMANCE AND SECURE</label>
        </div>
    <div class="threeDiv">
        <div class="dualcameraDiv" style="margin-left:0px">
            <img id="ic-image" src="image/ic12.png">
            <div class="firstDivContainer">
                <label id="firsttext">PERFECT CUT</label><br>
                <label id="secondText">DUAL CAMERA</label><br><br>
                <label id="thirdText">Sadly, old age and grandchildren and the expected famine will return.</label>
            </div>
        </div>
        <div class="dualcameraDiv">
            <img id="ic-image" src="image/Screenshot (69).png">
            <div class="firstDivContainer">
                <label id="firsttext">PRETTY</label><br>
                <label id="secondText">INTELLIGENT PROCESSING</label><br><br>
                <label id="thirdText">Sadly, old age and grandchildren and the expected famine will return.</label>
            </div>
        </div>
        <div class="dualcameraDiv">
            <img id="ic-image" src="image/ic11.png">
            <div class="firstDivContainer">
                <label id="firsttext">MOST POPULAR</label><br>
                <label id="secondText">8GB DDR5 RAM</label><br><br>
                <label id="thirdText">Sadly, old age and grandchildren and the expected famine will return.</label>
            </div>
        </div>
    </div>

    <div class="firstContainer-headingphone">
        <label>FIND YOUR PERFECT MATCH</label><br>
        <label id="gray-text">EXPLORE AND FIND RIGHT ONE</label>
    </div><br><br><br>

    <!-- <div class="blur-imageDiv">
        <img src="">
    </div> -->
    <div class="slider">
    <div class="slides">
      <img src="image/p5.jpg" alt="Image 1">
      <img src="image/p6.png" alt="Image 2">
      <img src="image/p7_dd9c198a-6656-4739-9bee-40b506ba7a8c.jpg" alt="Image 3">
      <img src="image/p3.jpg" alt="Image 2">
      <img src="image/p11_8cda49a9-ed01-4335-ac14-1fdc05cb9958.jpg" alt="Image 3">
      <img src="image/p2.jpg" alt="Image 1">
      <img src="image/p5.jpg" alt="Image 1">
      <img src="image/p6.png" alt="Image 2">
      <img src="image/p7_dd9c198a-6656-4739-9bee-40b506ba7a8c.jpg" alt="Image 3">
      <img src="image/p3.jpg" alt="Image 2">
      <img src="image/p11_8cda49a9-ed01-4335-ac14-1fdc05cb9958.jpg" alt="Image 3">
      <img src="image/p2.jpg" alt="Image 1">
      <img src="image/p5.jpg" alt="Image 1">
      <img src="image/p6.png" alt="Image 2">
      <img src="image/p7_dd9c198a-6656-4739-9bee-40b506ba7a8c.jpg" alt="Image 3">
      <img src="image/p3.jpg" alt="Image 2">
      <img src="image/p11_8cda49a9-ed01-4335-ac14-1fdc05cb9958.jpg" alt="Image 3">
      <img src="image/p2.jpg" alt="Image 1">
      <img src="image/p5.jpg" alt="Image 1">
      <img src="image/p6.png" alt="Image 2">
      <img src="image/p7_dd9c198a-6656-4739-9bee-40b506ba7a8c.jpg" alt="Image 3">
    </div>
  </div>
  <script>
   
    let index = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slides img').length / 2; // only count unique slides

    function showNextSlide() {
      index = (index + 1) % totalSlides;
      slides.style.transition = index === 0 ? 'none' : 'transform 1s ease-in-out';
      slides.style.transform = `translateX(${-index * 100}%)`;

      if (index === 0) {
        setTimeout(() => {
          slides.style.transition = 'transform 1s ease-in-out';
          slides.style.transform = `translateX(0)`;
        }, 20);
      }
    }

    setInterval(showNextSlide, 3000);
  </script>

    <br><br><br><br><br><br>
    <div class="fiveimagepage">
        <div class="first-4divimage">
            <div class="first-image-In4image">
                <img src="image/gal1.jpg" style=" width: 100%; height: 384px;">
                
            </div>
            <div class="second-image-In4image">
            <img src="image/gal2.jpg" style=" width: 100%; height: 384px;">
            </div>
            <div class="third-image-In4image">
            <img src="image/gal3.jpg" style=" width: 100%; height: 384px;">
            </div>
            <div class="four-image-In4image">
            <img src="image/gal4.jpg" style=" width: 100%; height: 384px;">
            </div>
        </div>
        <div class="second-1divimage">
            <img src="image/gal5.jpg" style=" width: 100%; height: 769px;">
        </div>
    </div>
    <br><br><br><br><br><br>

    <div class="firstContainer-headingphonecollection">
        <label>NEW ARRIVALS</label><br>
        <label id="gray-text1">FIND THE PERFECT PHONE FOR YOU</label>
    </div>

<div class="maindivPhone">

    
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivo.jpg" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">vivo Y200 Pro 5G (Silk Black, 8GB RAM, 128GB Storage) (Silk Black)</div>
                <div class="starDiv">Still Black</div>
                <div class="priceDiv">₹24,999   <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivoy200.png" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">vivo Y200 Pro 5G (Silk Black, 8GB RAM, 128GB Storage) (Silk Green)</div>
                <div class="starDiv">Still Green</div>
                <div class="priceDiv">₹24,999 <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivoy18.jpg" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">Vivo V30e 5G Smartphone (8GB RAM, 128GB Storage) (Velvet Red)</div>
                <div class="starDiv">Still Black</div>
                <div class="priceDiv">₹27,999   <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    

</div>

    </div>
    <div class="maindivPhone">

    
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivo.jpg" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">vivo Y200 Pro 5G (Silk Black, 8GB RAM, 128GB Storage) (Silk Black)</div>
                <div class="starDiv">Still Black</div>
                <div class="priceDiv">₹24,999   <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivoy200.png" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">vivo Y200 Pro 5G (Silk Black, 8GB RAM, 128GB Storage) (Silk Green)</div>
                <div class="starDiv">Still Green</div>
                <div class="priceDiv">₹24,999 <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    <div class="FirstDiv">
        <div class="phoneDivupper">
            <img src="image/vivoy18.jpg" alt="vivo" style="width: 99%;">
            <div class="phoneDivlowertext">
                <div class="firsttextdiv">Vivo V30e 5G Smartphone (8GB RAM, 128GB Storage) (Velvet Red)</div>
                <div class="starDiv">Still Black</div>
                <div class="priceDiv">₹27,999   <span style="color: green;">17% OFF</span></div>
            </div>
        </div> 
    </div>
    

</div>

    </div>

    <br><br><br><br><br><br>
    <div class="lose-yourselfDiv">
        <img src="image/img-7_54376782-045f-4d57-bb5a-250e33d54a77.jpg" style=" width: 100%; height: 641px;">
        <div class="firstContainer-heading-whiteDiv">
            <label>WHAT MAKES THE ESSENTIAL DIFFERENT?</label><br>
            <div class="gray-text-div">
                <label id="gray-text">EXPERIENCE HIGH PERFORMANCE AND SECURE</label>
            </div>
        </div>
        <div class="three-white-Divs">
            <div class="first-white-div">
                <div class="number-heading-div">
                    <div class="NumberDiv">
                    <label>1</label>
                    </div>
                </div>
                <div class="text-heading-div-tripplecamera">TRIPLE CAMERA</div>
                <div class="text-heading-para-div-tripplecamera">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ut?</div>
                <div class="text-heading-div-button">
                    <button>View More</button>
                </div>

            </div>
            <div class="second-white-div">
            <div class="number-heading-div">
                    <div class="NumberDiv">
                    <label>2</label>
                    </div>
                </div>
                <div class="text-heading-div-tripplecamera">ULTRA GAME MODE</div>
                <div class="text-heading-para-div-tripplecamera">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ut?</div>
                <div class="text-heading-div-button">
                    <button>View More</button>
                </div>
            </div>
            <div class="third-white-div">
            <div class="number-heading-div">
                    <div class="NumberDiv">
                    <label>3</label>
                    </div>
                </div>
                <div class="text-heading-div-tripplecamera">SUPER AMOLED DISPLAY</div>
                <div class="text-heading-para-div-tripplecamera">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, ut?</div>
                <div class="text-heading-div-button">
                    <button>View More</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>