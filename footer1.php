<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .footer-div {
            background-color: #333;
            color: white;
            padding: 40px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 6%;
        }
        .col-row-first {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
        }
        .first-footerdiv, .second-footerdiv, .third-footerdiv, .fourth-fotterdiv {
            flex: 1;
            margin: 0 10px;
        }
        .first-footerdiv label, .second-footerdiv label, .third-footerdiv label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .first-footerdiv label:first-child, .second-footerdiv label:first-child, .third-footerdiv label:first-child {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .instaetcDiv {
            margin-top: 20px;
            text-align: center;
        }
        .instaetcDiv img {
            width: 36px;
            margin: 0 10px;
            cursor: pointer;
        }
        .col-secondrow-footer {
            margin-top: 98px;
            text-align: center;
        }
        .last-col-footer {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            justify-content: center;
        }
        .last-col-footer li {
            margin: 0 15px;
            cursor: pointer;
        }
        .last-col-footer li:hover {
            text-decoration: underline;
        }
        #labels{
            color: white;
            font-size: 17px;
            font-family: sans-serif;
            font-weight: inherit;
        }
        a{
            text-decoration:none;
        }
        #labels:hover{
            color:red;
        }
    </style>
</head>
<body>
    <div class="footer-div">
        <div class="col-row-first">
            <div class="first-footerdiv">
                <label>PRODUCTS</label>
                <a href="smartphones.php"><label id="labels" >Smartphones</label></a>
                <a href="tablets.php"><label id="labels">Tablets</label></a>
                <a href="iphones.php"><label id="labels">I-Phones</label></a>
                <a href="accessories.php"><label id="labels">Accessories</label></a>
            </div>
            <div class="second-footerdiv">
                <label>HELP</label>
                <a href="contact.php"><label id="labels">Contact Us</label></a>
                <label id="labels">FAQ</label></a>
                <!-- <label id="labels">Accessibility</label> -->
            </div>
            <div class="third-footerdiv">
                <label>ABOUT</label>
                <label id="labels">Our Story</label></a>
                <a href="about.php"><label id="labels">About Us</label></a>
                <!-- <label id="labels">Press</label> -->
            </div>
            <div class="fourth-fotterdiv">
                <div class="instaetcDiv">
                    <img src="image/icons8-instagram-208.png" alt="Instagram">
                    <img src="image/icons8-facebook-480.png" alt="Facebook">
                    <img src="image/icons8-twitter-500.png" alt="Twitter">
                    <img src="image/icons8-linkedin-500.png" alt="LinkedIn">
                </div>
            </div>
        </div>
        <div class="col-secondrow-footer">
            <label id="label2022">@2022 Olipop, Inc. All Rights Reserved</label>
            <ul class="last-col-footer">
                <li>Terms of Service</li>
                <li>Privacy Policy</li>
                <li>Do Not Sell Information</li>
            </ul>
        </div>
    </div>
</body>
</html>