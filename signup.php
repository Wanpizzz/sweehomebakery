<?php
    // session_start();
    include("connection.php");
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>user signup</title>
    <link rel="stylesheet" href="styleSignup.css">
</head>
<body>
    <header>
        <form action="signup.php" method="post" autocomplete="off">
            <div class="container">
                <div class="form2">
                    <h2>Sweet Home Bakery</h2>
                    <label for="userID">Username</label>
                    <input type="text" id="userID" name="userID" required> <br>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required><br>
                    <label for="Email">E-mail</label>
                    <input type="email" id="Email" name="Email" required><br>
                    <label for="Pass">Password</label>
                    <input type="password" name="Pass" id="Pass" required><br>
                    <label for="phoneNum">Phone Number</label>
                    <input type="tel" name="phoneNum" id="phoneNum" required><br>
                    <input type="submit" value="Sign Up">
                </div>
                <div class="Already">
                    <h5>Already have an account?</h5>
                    <a href="login.php">Log In</a>
                </div>
            </div>
        </form>
    </header>
</body>

<?php
    if (!empty($_POST)) {
        include("connection.php");

        $userId = $_POST['userID'];
        $name = $_POST['name'];
        $email = $_POST['Email'];
        $pass = $_POST['Pass'];
        $phoneNum = $_POST['phoneNum'];
        $address = "";
        $city = "";
        $postcode = "";

        $sql = "INSERT INTO customer (custID, custName, custEmail, custPhoneNo, passCust, custAddress, city, postcode)
        VALUES ('$userId', '$name', '$email', '$phoneNum', '$pass', '$address', '$city', '$postcode')";

        if(mysqli_query($conn, $sql)) {
            $_SESSION['custID'] = $userId; // Store the userID in a session variable
            echo "<script>alert('Successful');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Unsuccessful');</script>";
            echo "<script>window.history.back();</script>";
        }
    }
?>

</html>
