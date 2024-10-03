<?php
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require('_dbconnection.php');
    $user_email = $_POST['singnupEmail'];
    $pass = $_POST['singupPassword'];
    $cpass = $_POST['singupcPassword'];

    $exitsql = "SELECT * FROM `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $exitsql);
    $numrows = mysqli_num_rows($result);
    if ($numrows > 0) {
        header("Location: /Forum_Project/index.php?emailError=true");
        exit();
    } else {
        if (($pass == $cpass)) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showresult = true;
                header("Location: /Forum_Project/index.php?singupsuccess=true");
                exit();
            }
        } else {
            $showError = "Password do not match ";
        }
    }
    header("Location: /forum_project/index.php?singupsuccess=false&error=$showError");
}
