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

    $resvID = NULL;

    #select roomnum, location of current reservation from reserves
    #select all reservationIDs from reserves for that roomnum and location
    #select reservation with startdate >= $startdate and enddate <= enddate and reservationID != $reservationID

    $sql = "    SELECT ReservationID
                FROM reserves
                WHERE Room_Num = '$roomnum' and Location = '$location'";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $resvID = $row["ReservationID"];
            $nestedsql = "  SELECT Start_Date, End_Date
                            FROM reservation
                            WHERE ReservationID != '$resID' and ReservationID = '$resvID'";
            $nestedresult = mysqli_query($con,$nestedsql);
            if (is_object($nestedresult) && $nestedresult->num_rows > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($nestedresult)) {
                    echo $row["Start_Date"].  "," . $row["End_Date"]. ".";
                }
            }
        }
    } else {
        echo "No reservations for this room.";
    }

    mysqli_close($con);
?>
 