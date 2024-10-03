<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to our iForum_Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark bg-opacity-25">
    <!-- <?php require('partials/_dbconnection.php') ?> -->

    <?php require('partials/_header.php') ?>

    <?php

    if (isset($_GET['contactError']) && ($_GET['contactError']) == 'true') {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Sorry!</strong> your Email address already exits!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else if (isset($_GET['contactinfo']) && ($_GET['contactinfo']) == 'true') {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> your data has been inserted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else if (isset($_GET['contactinfo']) && ($_GET['contactinfo']) == 'false') {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Sorry!</strong> your data has not been inserted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <h1 class="text-center my-1"><u>Contact us:</u></h1>
    <div class="container my-2 " style="width: 35%;">
        <form action="/forum_project/partials/_handlecontact.php" method="post" class="bg-secondary rounded p-4 text-dark bg-opacity-50">
            <div class="mb-3">
                <label for="username" class="form-label fw-bold fs-5">Username:</label>
                <input placeholder="enter your name" type="text" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="useremail" class="form-label fw-bold fs-5">Email address</label>
                <input placeholder="enter your email address" type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Make sure your Email is correct!</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold fs-5">Password:</label>
                <input placeholder="password" type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label fw-bold fs-5">ContactNo:</label>
                <input placeholder="enter your contact number" type="text" class="form-control" id="number" name="number">
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label fw-bold fs-5">Comment:</label>
                <textarea placeholder="enter your comment here" type="text" name="textarea" id="textarea" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary fw-bold fs-5">Submit</button>
        </form>
    </div>
    <?php require('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>