<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: /");
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
    <div class="container">
        <h1>Dashboard</h1>
        <?php echo $_SESSION["username"] . " " . $_SESSION["email"] ?>
        <button><a href="/helpers/logout.php">logout</a></button>
    </div>
</body>

</html>