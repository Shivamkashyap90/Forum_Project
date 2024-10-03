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

    <!-- craousel slider start here -->
    <div>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/2400/800?pythonlanguage" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/2400/800?Coding,code" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/2400/800?codelanguage" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Catagories container start here. -->

    <div class=" my-0 bg-secondary">
        <h2 class="text-center my-1 p-3 mb-2 bg-primary text-white"> iForum - Browse Catagories</h2>
        <div class=" container-fluid row my-1 ">

            <!-- fetch all the catagory here -->
            <?php
            $sql = "SELECT * FROM `iforum`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['catagory_id'];
                // echo $row['catagory_name'];
                $cat_id = $row['catagory_id'];
                $cat_n = $row['catagory_name'];
                $cat_d = $row['catagory_description'];

                echo '
                 
                <div class="col-md-4 p-3 ">
                <div class="card rounded overflow-hidden shadow-lg" style="width: 18rem;">
                    <img src="https://picsum.photos/400/250?' . $cat_n . ',computer" alt="">
                    <div class="card-body">
                        <h5 class="card-title"> <a href="threadlist.php?catid=' . $cat_id . '">' . $cat_n . '</a> </h5>
                        <p class="card-text bg-secondary text-white p-3 padding-left-1 rounded fst-italic">' . $cat_d . '</p>
                        <a href="threadlist.php?catid=' . $cat_id . '" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>
            ';
            }
            ?>
        </div>

    </div>
    <?php require('partials/_footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>