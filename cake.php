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

        <!-- <div class="cart" id="cart">
            <div class="title">MY CART</div><br/>
            <div id="title"></div> -->

            <!-- <a href="payment.php" class="checkout-btn">Checkout</a> -->
            <!-- <div class="total">
              <span class="total-label">Total Quantity:</span>
              <span class="total-quantity">0</span>
            </div> -->

        <!-- </div> -->

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
            $sql = "SELECT * FROM menu WHERE catID = 1";
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
        

            <!-- <div class="item" id="item1">
                <img src="image/cake.jpg">
                <h4>Chocolate Ganache Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM77</h4>
                </div>
                <button onclick="addToCart(item1)">Add To Cart</button>
            </div>
            <div class="item" id="item2">
                <img src="image/cake1.jpg">
                <h4>Strawberry Pink Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM72</h4>
                </div>
                <button onclick="addToCart(item2)">Add To Cart</button>
            </div>
            <div class="item" id="item3">
                <img src="image/cake6.jpg">
                <h4>Pure Vanilla Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM88</h4>
                </div>
                <button onclick="addToCart(item3)">Add To Cart</button>
            </div>
            <div class="item" id="item4">
                <img src="image/cake3.jpg">
                <h4>Lavender Blueberry Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM61</h4>
                </div>
                <button onclick="addToCart(item4)">Add To Cart</button>
            </div>
            <div class="item" id="item5">
                <img src="image/cake4.jpg">
                <h4>Butterfly Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM103</h4>
                </div>
                <button onclick="addToCart(item5)">Add To Cart</button>
            </div>
            <div class="item" id="item6">
                <img src="image/cake5.jpg">
                <h4>Strawberry Cream Cake</h4>
                <div class="price">
                    <h4 class="price-tag">RM60</h4>
                </div>
                <button onclick="addToCart(item6)">Add To Cart</button>
            </div> -->

            <div id="cart"></div>
        

        <!-- <a href="payment.php" class="checkout-btn">Checkout</a> -->

        <script>
            showCart(); // Call the showCart() function to display the cart contents
        </script>

    </body>
</html>