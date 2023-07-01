<?PHP
    session_start();
    date_default_timezone_set("Asia/Kuala_Lumpur"); 
    #----------------- Bahagian login & logout Session ------------

    $namafail = basename($_SERVER['PHP_SELF']);

    if(($namafail !='homemenu.php'  and $namafail !='pastry.php' and $namafail !='cake.php' and $namafail !='dessert.php' and $namafail != 'payment' and $namafail !='order_details.php' and $namafail !='signup.php' and $namafail !='login.php') and empty($_SESSION['custID']))
    {
        die("<script>alert('Please signup');window.location.href='logout.php'</script>");
    }
?>






<!-- <!DOCTYPE html>
<html>
<body>
    <title>Sweet Home bakery</title>

    <link rel="stylesheet" href="login.css">
</body>
</html> -->

<!-- ?php include "config.php"; ?>
<html>
    <head>
        <title>?php echo $sysname; ?></title>
</head>
<body><center>
    <TABLE BORDER="0" cellpadding="0" CELLSPACING="0">
        <tr> -->
            <!--file name is header.jpg-->
            <!-- <td width="1000" height="200" background="?php echo $logo; ?>"
            valign="center" style="background-repeat:no repeat;" > -->
            <!-- change suitable system name-->
            <!-- <FONT SIZE="+1" COLOR="black" font face="Arial">
            ?php echo $sysname; ?></FONT></br>
            <FONT SIZE="+4" COLOR="black" font face="Arial">
            ?php echo $bakeryname; ?></FONT></br> 
            <FONT SIZE="+2" COLOR="blue" font face="Arial"><i>
            ?php echo $moto; ?></i></FONT>
        </td>
    </p>
</tr>
</center>
</TABLE>
</body></center> -->
<!-- RECALL ZOOM FILE -->
<!-- ?php include "zoom.php"; ?> -->
<!-- RECALL CHANGE COLOR NAME -->
<!-- ?php include "color.php";?> -->
<!-- </html> -->