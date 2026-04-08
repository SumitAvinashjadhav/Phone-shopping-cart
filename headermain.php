 href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var isLoggedIn = <?php echo json_encode($loggedIn); ?>;
            var username = <?php echo json_encode($username); ?>;
            
            if (isLoggedIn) {
                $('.login-status').html('<a class="buy" href="logout.php">LogOut</a><br>');
            } else {
                $('.login-status').html('<a class="buy" href="login.php">Login</a>');
            }

            // Dropdown functionality
            $(".dropdown").hover(function() {
                $(this).find(".dropdown-content").toggleClass("show");
            });
        });
    </script>
    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .quantity-badge {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            position: relative;
            top: -10px;
            left: -10px;
        }
    </style>
</head>
<body>
    <div class="blackfirstDiv">
        <label>Long Weekend Sale Up to 50% OFF Shop Now</label>

        <div class="uname">
            <img style="width: 27%; margin-left: -28px; margin-top: -5px;" src="image/icons8-user-96.png">
            <?php echo "$username"; ?>
        </div>
    </div>
    <div class="second-container">
        <div class="image-div">
            <img src="image/logo.png">
        </div>
        <nav>
            <ul>
                <li class="hideOnMobile"><a href="phono.php">Home</a></li>
                <li class="hideOnMobile"><a href="product.php">Collection</a></li>
                <li class="hideOnMobile dropdown"><a href="#">Shop</a>
                    <ul class="dropdown-content">
                        <li><a href="#">Smartphones</a></li>
                        <li><a href="#">Tablets</a></li>
                        <li><a href="#">Laptops</a></li>
                        <li><a href="#">Wearables</a></li>
                    </ul>
                </li>
                <li class="hideOnMobile"><a href="#">Android</a></li>
                <li class="hideOnMobile"><a href="#">Accessories</a></li>
                <li class="hideOnMobile"><a href="contact.php">Contact Us</a></li>
                <li>
                    <div class="cart-icon">
                        <a href="addtocart.php"><img class="userimage1" alt="cart" src="image/shopping.png"></a>
                        <span class="quantity-badge"><?php echo $total_quantity ? $total_quantity : 0; ?></span>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="yellowDiv">
            <li class="login-status"></li> <!-- Placeholder for login or user info -->
        </div>
    </div>
</body>
</html>