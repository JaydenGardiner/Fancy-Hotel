<?php
    $resID = $_GET['Reservation_ID'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "    SELECT Room_Num, Location
                FROM reserves
                WHERE ReservationID = '$resID'";

    $result = mysqli_query($con,$sql);
 
    $roomnum = NULL;
    $location = NULL;

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $roomnum = $row["Room_Num"];
            $location = $row["Location"];
        }
    }

    $cost = NULL;
    $costextrabed = NULL;

    $sql = "    SELECT CostPerDay, CostOfExtraBed
                FROM room
                WHERE Room_Num = '$roomnum' and Location = '$location'";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["CostPerDay"].  "," . $row["CostOfExtraBed"]. "";
        }
    } else {
        echo "Error.";
    }

    mysqli_close($con);
?>
 