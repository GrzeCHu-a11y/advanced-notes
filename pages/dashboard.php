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
            <div class="accordion" id="accordionExample">
                <?php foreach ($notes as $key => $note) : ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $key; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
                                <?php echo $note['title'] ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $note['content'] ?>
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