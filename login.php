<?php
    // session_start();
    include("connection.php");
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User login</title>
    <link rel="stylesheet" href="styleLogin.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <!-- <form onsubmit="return validateForm(event)"> -->
        <form action="login.php" method="post" autocomplete="off">
            <div class="form">
                <h2>Sweet Home Bakery</h2>
                    <label for="Uname">Username</label>
                    <input type="text" name="Uname" id="Uname" required> <br>
                    <label for="Pass">Password</label>
                    <input type="password" name="Pass" id="Pass" required><br>
                    <a href="homemenu.html"><input type="submit" name="submit" value="Log In"></a>

                <div class="Dont">
                    <h5>Don't have an account?</h5>
                    <!-- <a href="signup.html"><input type="button" value="Sign Up"></a> -->
                    <a href="signup.php">Sign Up</a>
                </div>
            </div><br>
            <div class="admin">
                    <h5>Admin login</h5>
                    <a href="admin/loginAdmin.php">Click Here</a>
            </div>
        </form>

    </header>
</body>

<?php
    if(!empty($_POST)) {
        include("connection.php");

        $cust_id = $_POST['Uname'];
        $cust_password = $_POST['Pass'];

        $sql = "SELECT * FROM customer
        WHERE custID = '$cust_id' AND passCust = '$cust_password'
        LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['custID'] = $row['custID'];
            $_SESSION['custName'] = $row['custName'];
            $_SESSION['custEmail'] = $row['custEmail'];
            $_SESSION['custPhoneNo'] = $row['custPhoneNo'];
            $_SESSION['passCust'] = $row['passCust'];

            echo "<script>window.location.href = 'homemenu.php';</script>";

        } else {
            echo "<script>alert('Username or password incorrect');
            window.history.back();</script>";
        }
    }
?>

</html>