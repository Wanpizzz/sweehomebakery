<?php
  include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>order-details</title>
  <link rel="stylesheet" type="text/css" href="css/styleOrder_details.css">
</head>
<body>
  <div class="payment-form">

    <h2>Order Details</h2>
    <p>Please enter your details below:</p>
    <!-- <form method="post" autocomplete="off"> -->
    <form method="post" autocomplete="off" id="orderForm">
      <div class="form-group">
        <label for="cAddress">Address:</label>
        <input type="text" id="cAddress" name="cAddress" required>
      </div>

      <div class="form-group">
        <label for="cCity">City:</label>
        <input type="text" id="cCity" name="cCity" required>
      </div>

      <div class="form-group">
        <label for="cPostcode">Postcode:</label>
        <input type="text" id="cPostcode" name="cPostcode" required>
      </div>

      <h2>Cart Items</h2>
      <ul id="cartItems"></ul>

      <!-- Hidden input field to store cart items -->
      <input type="hidden" id="cartItemsInput" name="cartItems" value="">

      <button type="button" onclick="goBack()">Cancel</button>
      <button type="submit">Proceed to Payment</button>
    </form>
  </div>

  <script>
    // JavaScript code to display cart items from local storage
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    var cartList = document.getElementById('cartItems');
    
    console.log(cartItems); // Log the cartItems array to the console

    for (var i = 0; i < cartItems.length; i++) {
      var item = document.createElement('li');
      item.innerHTML = cartItems[i];
      cartList.appendChild(item);
    }

    // Store the cartItems data in the hidden input field
    // document.getElementById('cartItemsInput').value = JSON.stringify(cartItems);

    // Store the cartItems data in the hidden input field
    // document.getElementById('cartItemsInput').value = JSON.stringify(cartItems.map(item => item.menuId));
    document.getElementById('cartItemsInput').value = JSON.stringify(cartItems);


    // Verify the JSON format in the console
    console.log(localStorage.getItem('cartItems'));
    
    function goBack() {
      window.history.back();
    }

    function submitForm() {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Retrieve the form data
    var form = document.getElementById('orderForm');
    var formData = new FormData(form);

    // Convert the form data to JSON
    var jsonData = {};
    for (var pair of formData.entries()) {
      jsonData[pair[0]] = pair[1];
    }

    // Send the JSON data to the server for processing
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'order_details.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // If the insertion is successful, redirect to the payment page
        window.location.href = "payment.php";
      }
    };

    xhr.send(JSON.stringify(jsonData));
  }

  </script>
</body>
</html>

<?php

  if(!empty($_POST)) {
    include("connection.php");

    $address = $_POST['cAddress'];
    $city = $_POST['cCity'];
    $postcode = $_POST['cPostcode'];

    // Assuming you have a session variable for the customer's username
    $userId = $_SESSION['custID'];

    // Start a transaction
    mysqli_begin_transaction($conn);

    try {
      $orderSql = "INSERT INTO orderr (custID, orderDate, orderTime) VALUES ('$userId', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
      if (mysqli_query($conn, $orderSql)) {
        $_SESSION['orderID'] = $orderId;
        $orderId = mysqli_insert_id($conn);
        $address = $POST['custAddress'];

        // Retrieve the cart items from localStorage
        // $cartItems = json_decode($_COOKIE['cartItems']);
        $cartItems = json_decode($_POST['cartItems'], true);

        foreach ($cartItems as $item) {
          // Insert each item as a separate row in the orderitem table
          // $menuId = $item->menuId;
          // $quantity = $item->quantity;
          // $menuId = $item['menuId'];
          // $quantity = $item['quantity'];
          $menuId = $item;
          $quantity = 1;

          // Retrieve the menu item based on menuId
          $menuQuery = "SELECT * FROM menu WHERE menuID = '$menuId'";
          $menuResult = mysqli_query($conn, $menuQuery);
          $menuData = mysqli_fetch_assoc($menuResult);

          if ($menuData) {
            // Insert each item as a separate row in the orderitem table
            // $menuId = $menuData['menuID']; // Update the $menuId variable with the retrieved menuID
            $menuId  = $menuData['menuID'];
            $itemSql = "INSERT INTO orderitem (orderID, menuID, quantity) VALUES ('$orderId', '$menuId ', '$quantity')";
            mysqli_query($conn, $itemSql);
          } else {
              //echo "Invalid menu item. MenuID: $menuId<br>";
              // throw new Exception('Invalid menu item');
              // continue;
          }

          // Log the menu data retrieved from the database
          //echo "Menu Data:<br>";
          //print_r($menuData);
          //echo "<br>";

        }

        $custSql = "UPDATE customer SET custAddress = '$address', city = '$city', postcode = '$postcode' WHERE custID = '$userId'";

        if (mysqli_query($conn, $custSql)) {
          // Commit the transaction if all queries are successful
          mysqli_commit($conn);
          $address = $_SESSION['custAddress'];
          $address = $POST['custAddress'];

          echo "<script>alert('Order placed successfully');</script>";
          echo "<script>window.location.href = 'receipt.php';</script>";
        } else {
          throw new Exception('Failed to update customer details');
        }
      } else {
        throw new Exception('Failed to place order');
      }
    } catch (Exception $e) {
      // Rollback the transaction if any query fails
      mysqli_rollback($conn);

      echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
      echo "<script>window.history.back();</script>";
    }
  }
?>

