<?php

declare(strict_types=1);

require_once("src/QueryController.php");

$query = new QueryController();
$query->openNote();

$data = $query->openNote();
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
            <h3><?php echo $data["title"] ?></h3>
            <p><?php echo $data["content"] ?></p>
        </div>

    </section>
</body>

</html>