<?php
    // session_start();
    include("connection.php");
    include('header.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Menu Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="css/food.css">
        <script type="text/javascript" src="cart.js"></script>
    </head>
    <body>

        <div class="header">
            <a href="homemenu.php" class="home-btn">
            <i class="fas fa-arrow-left"></i> Back to Home</a>
            <h1>MENU FOR PASTRY</h1>
        </div>

        <!-- <h1>MENU FOR PASTRY</h1> -->
        <nav>
            <ul>
                <a href="pastry.php"><li>Pastry</li></a>
                <a href="cake.php"><li>Cake</li></a>
                <a href="dessert.php"><li>Dessert</li></a>
            </ul>
            <h4>MY CART</h4>
            <i class="fa-solid fa-cart-shopping"></i>
        </nav>

        <div class="cart-container">
            <div class="cart" id="cart">
                <div class="title">MY CART</div><br/>
                <div id="cartItems"></div>
            </div>
    
            <div class="checkout-container">
                <a href="order_details.php" class="checkout-btn">Checkout</a>
            </div>
        </div>

        <?php
            $n = 1;
            $sql = "SELECT * FROM menu WHERE catID = 2";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num < 1) {
                echo "<h3>No item found</h3>";
            } else {      
        ?>
        <section class="items">
        <?php
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="item" data-menu-id="<?php echo $row['menuID']; ?>">
                <img src="image/<?php echo $row['image']; ?>">
                <h4><?php echo $row['menuName']; ?></h4>
                <div class="price">
                    <h4 class="price-tag">RM<?php echo $row['menuPrice']; ?></h4>
                </div>
                <button onclick="addToCart(this.parentNode)">Add To Cart</button>
            </div>
        
        <?php
                $n++;
                }
            }
        ?>
        </section>
        
        <!-- <section class="items">
            <div class="item" id="item7">
                <img src="image/pastry.jpg">
                <h4>Scones Strawberry with cream</h4>
                <div class="price">
                    <h4 class="price-tag">RM10</h4>
                </div>
                <button onclick="addToCart(item7)">Add To Cart</button>
            </div>
            <div class="item" id="item8">
                <img src="image/pastry1.jpg">
                <h4>Dip Churros</h4>
                <div class="price">
                    <h4 class="price-tag">RM7.90</h4>
                </div>
                <button onclick="addToCart(item8)">Add To Cart</button>
            </div>
            <div class="item" id="item9">
                <img src="image/pastry2.jpg">
                <h4>Red Velvet Cookie</h4>
                <div class="price">
                    <h4 class="price-tag">RM6</h4>
                </div>
                <button onclick="addToCart(item9)">Add To Cart</button>
            </div>
            <div class="item" id="item10">
                <img src="image/pastry3.jpg">
                <h4>Blueberry Croffle with Icecream</h4>
                <div class="price">
                    <h4 class="price-tag">RM12.50</h4>
                </div>
                <button onclick="addToCart(item10)">Add To Cart</button>
            </div>
            <div class="item" id="item11">
                <img src="image/pastry4.jpg">
                <h4>Almond Croissant</h4>
                <div class="price">
                    <h4 class="price-tag">RM7</h4>
                </div>
                <button onclick="addToCart(item11)">Add To Cart</button>
            </div>
            <div class="item" id="item12">
                <img src="image/pastry5.jpg">
                <h4>Strawberry Croissant</h4>
                <div class="price">
                    <h4 class="price-tag">RM9.20</h4>
                </div>
                <button onclick="addToCart(item12)">Add To Cart</button>
            </div>
        </section> -->

        <script>
            showCart(); // Call the showCart() function to display the cart contents
        </script>

    </body>
</html>