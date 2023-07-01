<?php
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receipt</title>
    <link rel="stylesheet" href="receipt.css">
</head>
<body>
    <div class="receipt-detail">
        <h2>Receipt</h2>
        <hr>
        <div class="detail">
            <b>Room ID:</b> <?php echo $_SESSION['custName']; ?><br>
            <b>Date In:</b> <?php echo $_SESSION['custID']; ?><br>
            <b>Date Out:</b> <?php echo $_SESSION['custEmail']; ?><br>
            <b>Pax:</b> <?php echo $_SESSION['pax']; ?><br>
            <b>Duration:</b> <?php echo $_SESSION['total_days']; echo(" day/s") ?><br>
            <b>Room Detail:</b> <?php echo $_SESSION['room_detail'];?><br>
            <b>Room Price:</b> <?php echo $_SESSION['room_price']; ?><br>
            <b>Total Price:</b> <?php echo $_SESSION['total_price']; ?><br>
        </div>
    </div>
    <div class="btn">
        <input type="button" value="Print" onclick="window.print()">
        <button onclick="window.location.href='logout.php'">Back to Home</button>
    </div>
</body>