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


    <div class="container my-3">
        <h1>Search results for <em>"<?php echo $_GET['query'] ?>"</em></h1>
        <?php
        $noResult = true;
        $query = $_GET['query'];
        $sql = " SELECT * FROM `threads` WHERE MATCH (thread_title,thread_des) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $threadName = $row['thread_title'];
            $threadDes = $row['thread_des'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=" . $thread_id;
            echo '<div class="result">
            <h3><a href="' . $url . '" class="text-dard">' . $threadName . '</a> </h3>
            <p>' . $threadDes . '</</p>
        </div>';
        }

        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid p-3 mb-2 bg-secondary text-white">
                  <div class="container">
                    <p class="display-5">No results found</p>
                    <p class="lead">Suggestions:
                    <ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try differnet keywords. </li>
                        <li>Try more genral keywords.</li>
                    </ul>
                    </p>
                </div>
                </div>';
        }
        ?>

    </div>



    <!-- <?php require('partials/_footer.php') ?> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>