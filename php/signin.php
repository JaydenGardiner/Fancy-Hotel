<?php
    $username = $_GET['Username'];
    $password = $_GET['Password'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * 
            FROM customer
            WHERE Username='$username' AND PASSWORD='$password'";

    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) == 0) {
        //if no username in customer, check in manager table
        $sql = "SELECT * 
            FROM manager
            WHERE Username='$username' AND PASSWORD='$password'";

        $result = mysqli_query($con,$sql);

        if (mysqli_num_rows($result) == 0) {
            //If the username is not found, then show error message
            echo "Error.";
        } else {
            echo "Signed in!";
        }
    } else {
        echo "Signed in!";
    }

    mysqli_close($con);
?>
 