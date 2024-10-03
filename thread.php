<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to our iForum_Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require('partials/_dbconnection.php') ?>
    <?php require('partials/_header.php') ?>

    <?php
    $id = $_GET["threadid"];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $des = $row['thread_des'];


        // echo '   
        //      <div class="container my-4 p-4 mb-2 bg-dark text-white">

        //     <div class="jumbotron ">
        //         <h1 class="display-4">' .  $title  . '</h1>
        //         <p class="lead">' .  $des   . '</p>
        //         <hr class="my-4">
        //         <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        //     </div>
        // </div>';
    }

    ?>

    <?php

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // $id = $_GET['threadid'];

        $des = $_POST['comment'];
        $des = str_replace("<", "&lt;", $des);
        $des = str_replace(">", "&gt;", $des);

        $sno = $_POST['sno'];

        $sql = "INSERT INTO `comments` ( `comment_des`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$des', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> your comment has been posted successfully .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
        }
    }
    ?>

    <div class="container my-4 p-4 mb-2 bg-dark text-white">
        <div class="jumbotron ">
            <h1 class="display-4"><?php echo  $title; ?></h1>
            <p class="lead"><?php echo  $des; ?> </p>
            <hr class="my-4">
            <h2>Some rules of forum</h2>
            <p>
            <ul>
                <li>Here, you only do talk about your related topic not else </li>
                <li> Please do't talk about beyound the topics.</li>
            </ul>
            </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>


    <?php
    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
        echo  '
    <div class="container  my-4 bg-secondary text-white p-4">
        <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
            <p class="display-6 p-3 mb-2 bg-info text-dark text-uppercase text-center"><b>Post your comments</b></p>
            <div class="mb-3">
                <label for="desc" class="display-6 my-2">Type your comment here</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="enter your comment"></textarea>
                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
            </div>
            <button type="submit" class="btn btn-info p-3"><b>Post Comment</b></button>
        </form>
    </div>';
    } else {
        echo '  <p class="display-6 p-3 mb-2 bg-info text-dark text-uppercase text-center"><b>Post your comments</b></p>
        <p class="lead text-center">You are not loged in. Please login to be able to post your comment.</p>';
    }
    ?>

    <div class="container my-4 ">
        <h1>Discussion</h1>
        <?php
        $id = $_GET["threadid"];
        $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $des = $row['comment_des'];
            $time = $row['comment_time'];
            $comment_by = $row['comment_by'];
            $sql2 = " SELECT user_email FROM `users` WHERE sno= ' $comment_by' ";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '<div class="media my-3 d-flex">
             <img src="/forum_project/image/default_img.png" height="40px" class="mr-3 " alt="...">
            <div class="media-body  mx-2">  
            <p class="fw-bold my-0 ">' . $row2['user_email'] . ' at ' . $time . '</p>
                 ' . $des . '
            </div>
        </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid p-3 mb-2 bg-secondary text-white">
                  <div class="container">
                    <p class="display-5">No threads found</p>
                    <p class="lead">Be the first person to ask the questions.</p>
                </div>
                </div>';
        }
        ?>

    </div>
    <?php require('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>