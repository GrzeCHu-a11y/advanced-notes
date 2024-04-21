<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>layout</title>
</head>

<body>

    <!-- navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">NoteSphere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION["id"])) :  ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/?action=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?action=createnote">Create note</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Project</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!isset($_SESSION["id"])) :  ?>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-outline-secondary me-2">
                            <a href="/?action=login">Login</a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="/?action=register">Register</a>
                        </button>
                    </div>
                <?php else : ?>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-outline-secondary me-2">
                            <a href="helpers/logout.php">Logout</a>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>


    <!-- navbar -->

    <main>
        <?php
        require_once("pages/$page.php");
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>