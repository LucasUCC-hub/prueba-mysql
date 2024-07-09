<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // database connection
    $host = "viaduct.proxy.rlwy.net";
    $port = "15977";
    $dbusername = "root";
    $dbpassword = "MJWtEzHqhaWKvUheNMyWwXICaoWtbkoh";
    $dbname = "railway";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // validate login auth
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // login success
        header("Location: sucess.html");
        exit();
    } else {
        header("Location: error.html");
        exit();
    }

    $conn->close();
}

?>