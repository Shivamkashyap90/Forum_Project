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

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $id = $_GET["catid"];
        $threadTitle = $_POST['title'];
        $threadDes = $_POST['desc'];

        $threadTitle = str_replace("<", "&lt;", $threadTitle);
        $threadTitle = str_replace(">", "&gt;", $threadTitle);

        $threadDes = str_replace("<", "&lt;", $threadDes);
        $threadDes = str_replace(">", "&gt;", $threadDes);

        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_des`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$threadTitle', '$threadDes', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> your record has been added successfully please wait for community response .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>



    <?php
    $id = $_GET["catid"];
    $sql = "SELECT * FROM `iforum` WHERE catagory_id =$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_n = $row['catagory_name'];
        $cat_d = $row['catagory_description'];
    }

    ?>

    <div class="container my-4 p-4 mb-2 bg-dark text-white">

        <div class="jumbotron ">
            <h1 class="display-4">Welcome to <?php echo  $cat_n; ?> forum</h1>
            <p class="lead"><?php echo  $cat_d; ?> </p>
            <hr class="my-4">
            <h2>Some rules of forum</h2>
            <p>
            <ul>
                <li>Here, you only do talk about your related topic not else </li>
                <li> Please do\'t talk about beyound the topics.</li>
            </ul>
            </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>



    <?php
    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
        echo  '<div class="container">
        <h1 class="text-center text-decoration-underline">Start discussion</h1>
        <div class="container my-4 bg-secondary text-white p-4">
            <form action=" ' . $_SERVER["REQUEST_URI"] . '" method="post">
                <p class="display-6 p-3 mb-2 bg-info text-dark text-uppercase text-center"><b>Type your problem here.</b></p>
                <div class="form-group ">
                    <label for="title" class="display-6">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small class="form-text text-muted my-5 text-bold">Keep your title as short and crips as possible.</small>
                </div>
                <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">

                <div class="mb-3">
                    <label for="desc" class="display-6">Elaborate your problem here</label>
                    <textarea class="form-control" id="desc" name="desc" placeholder="Enter your problem"></textarea>

                </div>

                <button type="submit" class="btn btn-info p-3"><b>Submit</b></button>
            </form>
        </div>
    </div>';
    } else {
        echo '  <h1 class="text-center text-decoration-underline">Start discussion</h1>
        <p class="lead text-center">You are not loged in. Please login to be able to start a discussion.</p>';
    }
    ?>

    <div class="container my-4 ">
        <?php
        $id = $_GET["catid"];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id =$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $threadName = $row['thread_title'];
            $threadDes = $row['thread_des'];
            $time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = " SELECT user_email FROM `users` WHERE sno= ' $thread_user_id' ";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            echo '
             <p class="fw-bold my-0 ">' . $row2['user_email'] . ' at ' . $time . '</p>
            <div class="media my-2 d-flex">
            <img src="/forum_project/image/default_img.png"  height="40px" class="mr-3 my-0" alt="...">
           
            <div class="media-body mx-2">
                <h5 class="mt-0  "><a  class ="text-dark"  href="thread.php?threadid=' . $id . ' ">' . $threadName . '</a></h5>
                 ' . $threadDes . '
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