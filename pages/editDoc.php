<?php
require_once("src/QueryController.php");

$query = new QueryController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editorData = $_POST["editorData"];
    $title = $_POST["noteTitle"];

    $query->updateNote($title, $editorData);
}

$noteData = $query->openNote();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Document editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/decoupled-document/ckeditor.js"></script>
</head>

<body>
    <section>
        <div class="container">
            <h3>Edit note</h3>


            <!-- The toolbar will be rendered in this container. -->
            <div id="toolbar-container"></div>

            <!-- This container will become the editable. -->
            <div id="editor">
                <p><?php echo $noteData["content"] ?></p>
            </div>

            <form method="post">
                <input type="hidden" name="editorData" id="editorData">
                <br>
                <label class="form-label" for="noteTitle">New note title</label>
                <input class="form-control" type="text" id="noteTitle" name="noteTitle" value="<?php echo $noteData["title"] ?>" />
                <br>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <script>
                DecoupledEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        const toolbarContainer = document.querySelector('#toolbar-container');

                        toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                        editor.model.document.on('change:data', () => {
                            const editorData = editor.getData();
                            document.getElementById('editorData').value = editorData;
                        });


                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
    </section>
</body>

</html>