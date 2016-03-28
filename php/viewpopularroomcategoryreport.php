<?php

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $sql = "    SELECT MONTH(reservation.Start_Date) AS Month, room.Room_Catag , reserves.Location , COUNT(reserves.ReservationID)
                FROM reservation, room, reserves
                where MONTH(reservation.Start_Date) = 12
                and reservation.ReservationID = reserves.ReservationID
                and room.Location = reserves.Location
                and room.Room_Num = reserves.Room_Num
                GROUP BY reserves.Location, room.Room_Catag
                ORDER BY (COUNT(reserves.ReservationID)) DESC";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<br>';
    foreach($row as $field) {
        echo ' ' . htmlspecialchars($field) . '';
    }
    echo '  ';
        }
    } else {
        echo "0 results.";
    }
            
    mysqli_close($con);
?>
 