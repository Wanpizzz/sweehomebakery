<?php
//sambungan MYSQLI dengan nama $samb
$samb = mysqli_connect("localhost","root", "", "sweethomebakery");
if (mysqli_connect_error()){
    echo "Failed to connect with MYSQL: ".mysqli_connect_error();
}

//setup bakery's name
$sysname="BAKERY SYSTEM MANAGEMENT";
$bakeryname="SWEET HOME BAKERY";
$address="Lot 88, Taman Exora, <br> 02500 Arau, Perlis";
$moto="Serve The Best Pastry";
$logo="header.jpg";
?>