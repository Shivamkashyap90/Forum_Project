<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
        <a class="navbar-brand" href="index.php">iForum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Catagories
                    </a>
                    <div class="dropdown-menu">';

$sql = "SELECT catagory_name , catagory_id from `iforum` limit 3";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo  '<a class="dropdown-item" href="threadlist.php?catid=' . $row["catagory_id"] . '">' . $row["catagory_name"] . '</a>';
}


echo '  </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex mx-2">';
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
    echo '
        <form class="form-inline my-2 my-lg-0 " action="search.php" method="get">
        <div class="d-flex d-inline-flex mx-2 my-0">
             <input class="form-control mx-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
            <p class="fw-bold text-primary my-2 mx-2">Hi,' . $_SESSION['username'] . '</p>
             <a href = "partials/_logout.php" class="btn btn-outline-success ml-2" >Logout</a>
        </div>
          <form>';
} else {
    echo ' 
         <form class="form-inline my-2 my-lg-0"> 
         <div class="d-flex d-inline-flex my-0">
                   <input class="form-control mr-sm-2 mx-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                     </div>
                    </form>
                    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success ml-2 " data-bs-toggle="modal" data-bs-target="#singupModal" >SingUp</button>
                    ';
}

echo '   </div>
            </div>
 </nav>';

include 'partials/_loginModal.php';
include 'partials/_singupModal.php';


if (isset($_GET['singupsuccess']) && ($_GET['singupsuccess']) == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Successfull Singup!</strong> Now you can login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} else if (isset($_GET['singupsuccess']) && ($_GET['singupsuccess']) == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry!</strong> Your password do not match, please try again!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['emailError']) && ($_GET['emailError']) == "true") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry!</strong> Your Email already in use, please try with another Email Thanku!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}




if (isset($_GET['login']) && ($_GET['login']) == 'true') {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Successfully Logedin !</strong> Thanku!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if (isset($_GET['login']) && ($_GET['login']) == 'false') {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Sorry !</strong> please check your Email or Password and agian try to login , Thanku .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
// <!-- for logout  -->
if (isset($_GET['logout']) && ($_GET['logout']) == 'true') {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>Sucssessfully Logout !</strong> Thanku!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
