<?php
$login = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('_dbconnection.php');
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    // $sql = "SELECT * FROM users where username = '$username' AND password = '$password' ";
    $sql = "SELECT * FROM `users` where user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $row['user_pass'])) {
                //$loggedin = true;
                //jab hamlog logged in ho jaynge tab niche wala kam karenge.
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['username'] = $email;
                header("location: /forum_project/index.php?login=true");
            } else {
                header("location: /forum_project/index.php?login=false");
            }
        }
    } else {
        header("location: /forum_project/index.php?login=false");
    }
}
