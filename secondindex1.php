<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="secondindex.css"> -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .white-background {
            background-color: #fff;
            padding: 40px 20px;
            text-align: center;
        }

        .firstContainer-heading, .firstContainer-headingphone, .firstContainer-headingphonecollection {
            margin-bottom: 30px;
        }

        .firstContainer-heading label, .firstContainer-headingphone label, .firstContainer-headingphonecollection label {
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        #gray-text, #gray-text1 {
            font-size: 18px;
            color: #777;
        }

        .threeDiv {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .dualcameraDiv {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            width: 300px;
            transition: transform 0.3s;
        }

        .dualcameraDiv:hover {
            transform: scale(1.05);
        }

        #ic-image {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
        }

        .firstDivContainer label {
            display: block;
            margin-bottom: 10px;
        }

        #firsttext {
            font-size: 20px;
            color: #333;
            font-weight: bold;
        }

        #secondText {
            font-size: 16px;
            color: #666;
        }

        #thirdText {
            font-size: 14px;
            color: #999;
        }

        .slider {
            width: 70%;
            max-width: 800px;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            margin: 40px auto;
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

        .maindivPhone {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .FirstDiv {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: 300px;
            transition: transform 0.3s;
        }

        .FirstDiv:hover {
            transform: scale(1.05);
        }

        .phoneDivupper img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .phoneDivlowertext {
            padding: 15px;
            text-align: left;
        }

        .firsttextdiv {
            font-size: 16px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .starDiv {
            font-size: 14px;
            color: #999;
            margin-bottom: 10px;
        }

        .priceDiv {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        .priceDiv span {
            font-size: 16px;
            color: green;
        }

    </style>
   
</head>
<body>
    <div class="white-background">
        <div class="firstContainer-heading">
            <label>WHAT MAKES THE ESSENTIAL DIFFERENT?</label><br>
            <label id="gray-text">EXPERIENCE HIGH PERFORMANCE AND SECURE</label>
        </div>
        <div class="threeDiv">
            <div class="dualcameraDiv">
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
        </div>

        <div class="slider">
            <div class="slides">
                <!-- Radio buttons for navigation -->
                <input type="radio" name="radio-btn" id="radio1" checked>
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
                    <div class