<?php

declare(strict_types=1);

if (!isset($_SESSION["id"])) {
    header("Location: /");
}

require_once("src/QueryController.php");
$query = new QueryController();
$notes = $query->getNotes();

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
            <h3>Notes list</h3>
            <div class="row">
                <?php foreach ($notes as $note) : ?>
                    <div class="col-sm-6 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $note["title"] ?></h5>
                                <p class="card-text">
                                    <?php $content = substr($note["content"], 0, 15);
                                    if (strlen($note["content"])) {
                                        $content .= "...";
                                    }
                                    echo $content;
                                    ?>
                                </p>
                                <form method="get" action="/?action=openNote"> <!-- Używamy GET, ponieważ przekazujemy parametry w adresie URL -->
                                    <input type="hidden" name="action" value="openNote">
                                    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                                    <button type="submit" class="btn btn-outline-success">Open</button>
                                </form>

                                <button type="button" class="btn btn-outline-danger">Delete</button>
                                <button type="button" class="btn btn-outline-warning">Edit</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
    </section>
</body>

</html>