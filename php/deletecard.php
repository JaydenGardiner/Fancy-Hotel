<?php
    $card_num = $_GET['Card_Number'];
    $customer = $_GET['Customer'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "DELETE
            FROM credit_card
            WHERE Card_Number = '$card_num' AND Customer = '$customer'";

    echo $card_num;
    echo $customer;

    $result = mysqli_query($con,$sql);

    //add if statement
    echo("Credit card deleted!");

    mysqli_close($con);
?>
 