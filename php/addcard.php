<?php
    $card_num = $_GET['Card_Number'];
    $name_on_card = $_GET['Name_on_Card'];
    $exp_date = $_GET['Exp_Date'];
    $cvv = $_GET['CVV'];
    $customer = $_GET['Customer'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO credit_card(Card_Number, Name_on_Card, Exp_Date, CVV, Customer)
            VALUES('$card_num', '$name_on_card', '$exp_date', '$cvv', '$customer')";

    $result = mysqli_query($con,$sql);

    //add if statement
    echo("Credit card added!");

    mysqli_close($con);
?>
 