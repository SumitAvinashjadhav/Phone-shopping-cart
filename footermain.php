<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop Footer</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    /* background-color: #f0f0f0; */
    margin: 0;
}

.footer-div {
    margin-top: 10%;
    background-color: #333;
    color: white;
    /* padding: 40px 20px; */
    font-size: 14px;
    width: 100%;
}

.col-row-first {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.first-footerdiv, .second-footerdiv, .third-footerdiv, .fourth-footerdiv {
    flex: 1;
    margin: 10px;
    min-width: 200px;
}

.first-footerdiv h3, .second-footerdiv h3, .third-footerdiv h3, .fourth-footerdiv h3 {
    font-size: 18px;
    margin-bottom: 20px;
    border-bottom: 1px solid white;
    padding-bottom: 10px;
}

ul {
    list-style-type: none;
    padding: 0;

}

ul li {
    margin-bottom: 10px;
    margin-left: 10px;
}

ul li a {
    color: white;
    text-decoration: none;
}

ul li a:hover {
    text-decoration: underline;
}

.fourth-footerdiv p {
    margin-bottom: 20px;
}

#emailinput {
    padding: 10px;
    width: calc(100% - 22px);
    margin-bottom: 10px;
    border-radius: 5px;
    border: none;
    font-size: 14px;
}

#subscribe-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    width: 100%;
}

#subscribe-button:hover {
    background-color: #0056b3;
}

.instaetcDiv a {
    display: inline-block;
    margin-right: 15px;
}

.instaetcDiv img {
    width: 29px;
    height: auto;
    
}

.instaetcDiv {
    width: 29px;
    height: auto;
    margin-top: 23px;
    margin-left: 61px;
    display: flex;
}

.col-secondrow-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #444;
    padding-top: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
}

#label2022 {
    margin: 0;
    flex: 1;
    text-align: left;
}

.last-col-footer {
    list-style-type: none;
    display: flex;
    padding: 0;
    margin: 0;
    flex: 1;
    justify-content: flex-end;
}

.last-col-footer li {
    margin-left: 20px;
}

.last-col-footer li a {
    color: white;
    text-decoration: none;
}

.last-col-footer li a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .col-row-first, .col-secondrow-footer {
        flex-direction: column;
        text-align: center;
    }

    .last-col-footer {
        justify-content: center;
    }
}

    </style>
</head>
<body>
    <div class="footer-div">
        <div class="col-row-first">
            <div class="first-footerdiv">
                <h3>SHOP</h3>
                <ul>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Cases & Covers</a></li>
                </ul>
            </div>
            <div class="second-footerdiv">
                <h3>HELP</h3>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Returns</a></li>
                </ul>
            </div>
            <div class="third-footerdiv">
                <h3>ABOUT</h3>
                <ul>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </div>
            <div class="fourth-footerdiv">
                <h3>NEWSLETTER</h3>
                <p>Sign up to get the latest deals and news</p>
                <input id="emailinput" type="email" placeholder="Your Email Address">
                <button id="subscribe-button">Subscribe</button>
                <div class="instaetcDiv">
                    <a href="#"><img src="image/icons8-instagram-208.png" alt="Instagram"></a>
                    <a href="#"><img src="image/icons8-facebook-480.png" alt="Facebook"></a>
                    <a href="#"><img src="image/icons8-twitter-500.png" alt="Twitter"></a>
                    <a href="#"><img src="image/icons8-linkedin-500.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>
        <div class="col-secondrow-footer">
            <p id="label2022">&copy; 2024 Mobile Shop, Inc. All Rights Reserved</p>
            <ul class="last-col-footer">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Do Not Sell Information</a></li>
            </ul>
        </div>
    </div>
</body>
</html>