<?php
//$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require('_dbconnection.php');
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $comment = $_POST['textarea'];

    $exitsql = "SELECT * FROM `contact` where email = '$email'";
    $result = mysqli_query($conn, $exitsql);
    $numrows = mysqli_num_rows($result);
    if ($numrows > 0) {
        header("Location: /Forum_Project/contact.php?contactError=true");
        exit();
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `contact` (`username`, `email`, `password`,`number`,`comment`,`timestamp`) VALUES ('$username','$email', '$hash','$number','$comment',  current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //$showresult = true;
            header("Location: /Forum_Project/contact.php?contactinfo=true");
            exit();
        }
    }
}
header("Location: /forum_project/contact.php?contactinfo=false");
