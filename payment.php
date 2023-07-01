<?php
include ('header.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Page</title>
<style>
  /* CSS styles for the payment form */
  body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    background-color: antiquewhite;
  }

  .payment-form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .cart {
    margin-top: 30px;
  }

  .cart h2 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .cart ul {
    list-style-type: none;
    padding: 0;
  }

  .cart li {
    margin-bottom: 10px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
  }

  .item-title {
    font-weight: bold;
    margin-bottom: 5px;
  }

  .item-price {
    color: #888;
  }

  .total {
    font-weight: bold;
    margin-top: 10px;
  }

  button[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 7px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-left: 35px;
  }

  button[type="submit"]:hover {
    background-color: #45a049;
  }

  button[type="back"] {
    background-color: #4CAF50;
    margin-left: 35px;
    color: #fff;
    padding: 7px 17px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  button[type="back"]:hover {
    background-color: #45a049;
  }

</style>
</head>
<body>
  <div class="payment-form">
    <h2>Payment Details</h2>

    <div class="cart">
      <h2>Cart Items</h2>
      <ul id="cartItems"></ul>
      <div class="total" id="total"></div>
    </div>

    <div class="form-group">
      <label for="paymentMethod">Payment Method:</label><br>
      <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cash" required>
      <option value="r">dua</option>
      <option value="r">tiga</option>
      <label for="cashOnDelivery">Cash on Delivery</label><br>
      <input type="radio" id="onlinePayment" name="paymentMethod" value="online" required>
      <label for="onlinePayment">Online Payment</label>
    </div>

    <button type="submit">Proceed to Payment</button>
  </div>

  <script>
  // JavaScript code to display cart items from local storage
  var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  var cartList = document.getElementById('cartItems');

  for (var i = 0; i < cartItems.length; i++) {
    var item = document.createElement('li');
    var itemData = JSON.parse(cartItems[i]);
    var itemText = document.createTextNode(itemData.name + ' (Quantity: ' + itemData.quantity + ', Price: ' + itemData.price + ')');
    item.appendChild(itemText);
    cartList.appendChild(item);
  }
</script>



</body>
</html>

