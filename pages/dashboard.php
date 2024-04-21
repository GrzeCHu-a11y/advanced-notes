<?php

if (!isset($_SESSION["id"])) {
    header("Location: /");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container">
            <h1><?php echo "Welcome" . " " . $_SESSION["username"] ?></h1>
            <h3>Pined notes</h3>
        </div>
    </section>
</body>

</html>