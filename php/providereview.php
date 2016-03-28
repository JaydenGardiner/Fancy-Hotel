<?php
    $location = $_GET['Location'];
    $rating = $_GET['Rating'];
    $comment = $_GET['Comment'];
    $date = $_GET['Date'];
    $username = $_GET['Username'];

    $con=mysqli_connect("localhost","root","","fancy hotels");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO feedback(RatingID, Location, Rating, Comment, Date, LeftBy)
            VALUES(NULL, '$location', '$rating','$comment', '$date', '$username')";  

    $result = mysqli_query($con,$sql);

    echo("Review left!");
    
    mysqli_close($con);
?>
 