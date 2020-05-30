<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.maskedinput.min.js"></script>
    <title>Advertisement Board</title>

    <style><?php include "assets/vendor/bootstrap/css/bootstrap.min.css"; ?></style>
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/blog-post.css" rel="stylesheet">
    <script src="assets/datepicker/dist/js/datepicker.min.js"></script>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>


    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="assets/css/blog-home.css" rel="stylesheet">

</head>

<body>
    
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/page/1">Beejee Tasks</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/page/1">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/createTask">Create Task</a>
                </li>

                <?php if (!isset($_SESSION['admin'])){
                    echo '
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    ';
                } else {
                    echo '
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    ';
                };
                ?>
            </ul>
        </div>
    </div>
</nav>
<br>
    <br>
    <br>
    <br>
