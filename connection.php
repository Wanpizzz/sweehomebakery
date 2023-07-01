<?PHP
    $conn = mysqli_connect("localhost","root","","sweethomebakery") or die("Error: " . mysqli_error($condb));
    if (mysqli_connect_error()){
        echo "Failed to connect with MYSQL: ".mysqli_connect_error();
    }
?>