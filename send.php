<?php
    // getting all values from the HTML form
    $cusName = $_POST['name'];
    $cusEmail = $_POST['email'];
    $cusImage = $_POST['image'];
    $cusMessage = $_POST['message'];


    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "presentation";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO customers (cus_name, cus_email, cus_message, cus_image) VALUES ('$cusName', '$cusEmail', '$cusMessage','$cusImage')";
 
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Entries added! Redirecting...";
        // close connection
        mysqli_close($con);
        // Redirect to index.html after a 3-second delay
        header("refresh:3;url=home.php");
        exit; // Make sure to exit after redirecting
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

?>
send.php
Displaying send.php.
