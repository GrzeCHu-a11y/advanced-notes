<?php

declare(strict_types=1);
include_once("./src/RegisterController.php");

$registerController = new RegisterController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = [
        "email" => $_POST["email"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
    ];

    $registerController->handleRegister($data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container">
            <form method="post">
                <h2>Register</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" />
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="username" name="username" />
                    <div id="username" class="form-text">username</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" />
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-subtle me-2">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>