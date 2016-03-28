<?php
    $resID = $_GET['Reservation_ID'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "    UPDATE reservation
                SET isCanceled = '1'
                WHERE ReservationID = '$resID'";

    $result = mysqli_query($con,$sql);

//return reservation start date to check how many days canceled before

    $sql = "    SELECT Start_Date 
                FROM reservation
                WHERE ReservationID = '$resID'";

    $result = mysqli_query($con,$sql);

    $startdate = NULL;

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $startdate = $row["Start_Date"];
        }
    }

    echo $startdate;

    mysqli_close($con);
?>
 