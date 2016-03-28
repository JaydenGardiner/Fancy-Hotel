<?php
    $card_num = $_GET['Card_Number'];
    $customer = $_GET['Customer'];
    $start_date = $_GET['Start_Date'];
    $end_date = $_GET['End_Date'];
    $totalCost = $_GET['Total_Cost'];
    $extra_bed = $_GET['ExtraBed'];
    $room_num = $_GET['Room_Num'];
    $location = $_GET['Location'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT *
            FROM credit_card
            WHERE Card_Number = '$card_num' AND Customer = '$customer'";

    $result = mysqli_query($con,$sql);


    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "";
        }
    } else {
        echo "Error. Credit card does not exist in database.";
    }

    $sql="INSERT INTO reservation(ReservationID, Start_Date, End_Date, isCanceled, Total_Cost, Customer, CreditCardNum)
        VALUES(NULL, '$start_date', '$end_date', '0', '$totalCost', '$customer', '$card_num')";

    $result = mysqli_query($con,$sql);

    //get reservation ID
    //$resID

    $sql = "SELECT Resv.ReservationID
            FROM reservation Resv
            WHERE Start_Date = '$start_date' AND End_Date = '$end_date' AND Customer = '$customer'";

    $result = mysqli_query($con,$sql);

    $resID = '0';

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        if($row = mysqli_fetch_assoc($result)) {
            echo "" . $row["ReservationID"]. "";
            $resID = $row['ReservationID'];
        }
    } else {
        echo "Error.";
    }

    $sql=   "INSERT INTO reserves(ExtraBed, Room_Num, Location, ReservationID)
            VALUES('$extra_bed', '$room_num', '$location','$resID')"; 

    $result = mysqli_query($con,$sql);

    mysqli_close($con);
?>
 