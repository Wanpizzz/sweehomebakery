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
            $sql = "SELECT * FROM menu WHERE catID = 3";
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
            <div class="item" id="item13">
                <img src="image/dessert.jpg">
                <h4>Vanilla Caramel Icecream Sandwich</h4>
                <div class="price">
                    <h4 class="price-tag">RM10</h4>
                </div>
                <button onclick="addToCart(item13)">Add To Cart</button>
            </div>
            <div class="item" id="item14">
                <img src="image/dessert1.jpg">
                <h4>Douhgnut Icecream Cones</h4>
                <div class="price">
                    <h4 class="price-tag">RM12</h4>
                </div>
                <button onclick="addToCart(item14)">Add To Cart</button>
            </div>
            <div class="item" id="item15">
                <img src="image/dessert2.jpg">
                <h4>Chocolate Icecream</h4>
                <div class="price">
                    <h4 class="price-tag">RM6</h4>
                </div>
                <button onclick="addToCart(item15)">Add To Cart</button>
            </div>
            <div class="item" id="item16">
                <img src="image/dessert3.jpg">
                <h4>Birthday Vanilla Icecream</h4>
                <div class="price">
                    <h4 class="price-tag">RM6</h4>
                </div>
                <button onclick="addToCart(item16)">Add To Cart</button>
            </div>
            <div class="item" id="item17">
                <img src="image/dessert4.jpg">
                <h4>Strawberry Icecream</h4>
                <div class="price">
                    <h4 class="price-tag">RM6</h4>
                </div>
                <button onclick="addToCart(item17)">Add To Cart</button>
            </div>
            <div class="item" id="item18">
                <img src="image/dessert5.jpg">
                <h4>Banana Split</h4>
                <div class="price">
                    <h4 class="price-tag">RM8.90</h4>
                </div>
                <button onclick="addToCart(item18)">Add To Cart</button>
            </div>
        </section> -->

        <script>
            showCart(); // Call the showCart() function to display the cart contents
        </script>

    </body>
</html>