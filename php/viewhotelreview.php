<?php
    $location = $_GET['Location'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * 
            FROM feedback
            WHERE Location='$location'";

    $result = mysqli_query($con,$sql);

    if (is_object($result) && $result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Rating: " . $row["Rating"]. " Comment: " . $row["COMMENT"]. "<br>";
        }
    } else {
        echo "No reviews for this location.";
    }

    mysqli_close($con);
?>
 