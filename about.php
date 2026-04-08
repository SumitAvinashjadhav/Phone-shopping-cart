<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f5f5f5;
    color: #333;
}

.about-us-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.hero-section {
    position: relative;
    text-align: center;
    color: white;
}

.hero-section img {
    width: 100%;
    height: auto;
    filter: brightness(70%);
}

.hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.hero-text h1 {
    font-size: 3rem;
    margin: 0;
}

.hero-text p {
    font-size: 1.5rem;
    margin: 0;
}

.content-section, .team-section, .mission-section {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px 0;
    padding: 20px;
}

.content-section h2, .team-section h2, .mission-section h2 {
    font-size: 2rem;
    margin-bottom: 10px;
}

.content-section p, .mission-section p {
    font-size: 1rem;
    line-height: 1.5;
}

.team-section .team-members {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.team-member {
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    text-align: center;
    width: 250px;
}

.team-member img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.team-member h3 {
    font-size: 1.2rem;
    margin: 10px 0 5px;
}

.team-member p {
    font-size: 1rem;
    color: #666;
}
    </style>
</head>
<body>
    <div class="about-us-container">
        <div class="hero-section">
            <img src="image/black-friday-concept-with-smartphone-cart-space.jpg" alt="Hero Image">
            <div class="hero-text">
                <h1>About Us</h1>
                <p>Your trusted partner in mobile shopping.</p>
            </div>
        </div>
        <div class="content-section">
            <h2>Who We Are</h2>
            <p>At MobileShop, we believe in providing the best mobile shopping experience for our customers. Our team is dedicated to offering a wide selection of the latest smartphones and accessories at competitive prices.</p>
        </div>
        <div class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-members">
                <div class="team-member">
                    <img src="image/abo-07.jpg" alt="Team Member 1">
                    <h3>Irfan Inamdar</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="image/abo-07.jpg" alt="Team Member 2">
                    <h3>Akshay More</h3>
                    <p>Chief Marketing Officer</p>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
        <div class="mission-section">
            <h2>Our Mission</h2>
            <p>Our mission is to revolutionize the mobile shopping experience by offering top-notch products, exceptional customer service, and fast shipping. We strive to exceed our customers' expectations in every way.</p>
        </div>
    </div>
</body>
</html>
<?php
include("footer1.php");
?>