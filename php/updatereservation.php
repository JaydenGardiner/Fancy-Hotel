<?php
    $resID = $_GET['Reservation_ID'];
    $start_date = $_GET['Start_Date'];
    $end_date = $_GET['End_Date'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "UPDATE reservation
            SET End_Date = '$end_date',
                Start_Date = '$start_date'
            WHERE ReservationID =  '$resID'";

    $result = mysqli_query($con,$sql);

    mysqli_close($con);
?>
 