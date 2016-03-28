<?php

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    echo "August";

    $sql = "    SELECT MONTH(reservation.Start_Date) AS Month , reserves.Location , SUM(reservation.Total_Cost)
                FROM reservation, reserves
                where MONTH(reservation.Start_Date) = 8
                and reservation.ReservationID = reserves.ReservationID
                GROUP BY MONTH(reservation.Start_Date), reserves.Location";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr><br>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td> ';
    }
    echo '</tr>';
        }
    } else {
        echo "<br>0 results.";
    }

    echo "<br><br>September";

        $sql = "    SELECT MONTH(reservation.Start_Date) AS Month , reserves.Location , SUM(reservation.Total_Cost)
                    FROM reservation, reserves
                    where MONTH(reservation.Start_Date) = 9
                    and reservation.ReservationID = reserves.ReservationID
                    GROUP BY MONTH(reservation.Start_Date), reserves.Location";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr><br>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td> ';
    }
    echo '</tr>';
        }
    } else {
        echo "0 results.";
    }

    mysqli_close($con);
?>
 