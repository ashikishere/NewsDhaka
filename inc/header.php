<?php
include "admin/inc/connection.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet"
        href="css/style.css?v=<?php echo time(); ?>">

    <title>NewsToday | home</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">NewsToday</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <?php

                        $sql         = "SELECT * FROM category WHERE c_status=1";
                        $navber_item = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($navber_item)) {
                            $c_id    = $row['c_id'];
                            $c_name  = $row['c_name']; ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="post.php?category=<?php echo $c_id; ?>"><?php echo $c_name; ?></a>
                        </li>
                        <?php
                        }

                        ?>


                    </ul>
                </div>
            </div>
        </nav>

    </header>