<?php

declare(strict_types=1);

if (!isset($_SESSION["id"])) {
    header("Location: /");
}

require_once("helpers/fetchAllNotes.php");

$fetchAllNotes = new FetchAllNotes();
$notes = $fetchAllNotes->getAllNotes();

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
                <?php foreach ($notes as $key => $note) : ?>
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
                                <a href="#" class="btn btn-primary">open</a>
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