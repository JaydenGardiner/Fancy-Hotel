<?php
    $room_num = $_GET['Room_Num'];
    $location = $_GET['Location'];
    $startdate = $_GET['Start_Date'];
    $enddate = $_GET['End_Date'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

$sql = "    SELECT CostPerDay, CostOfExtraBed
                FROM room
                WHERE Room_Num = '$room_num' and Location = '$location'";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["CostPerDay"].  "," . $row["CostOfExtraBed"]. "";
        }
    } else {
        echo $room_num;
    }

    mysqli_close($con);
?>
 