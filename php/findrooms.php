<?php
    $location = $_GET['Location'];
    $startdate = $_GET['Start_Date'];
    $enddate = $_GET['End_Date'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT DISTINCT Room.Room_Num, Room.Room_Catag, Room.Persons_Allowed, Room.CostPerDay, Room.CostOfExtraBed
            FROM Room Room, Reserves Resv
            WHERE Room.Location = '$location' AND (Room.Room_Num IN(
                SELECT Resv.Room_Num
                FROM Reserves Resv,Reservation Res
                WHERE (Res.Start_Date > '$enddate' OR Res.End_Date < '$startdate')))
            ORDER BY Room.CostPerDay";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Room Number: " . $row["Room_Num"]. " Room Category: " . $row["Room_Catag"].  " # Persons Allowed: " . $row["Persons_Allowed"].  " Cost Per Day: " . $row["CostPerDay"].  " Cost Of Extra Bed Per Day: " . $row["CostOfExtraBed"]. " <br><br>";
        }
    } else {
        echo "No rooms found.";
    }

    mysqli_close($con);
?>
 