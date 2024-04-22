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
            <h3>Document editor</h3>

            <!-- The toolbar will be rendered in this container. -->
            <div id="toolbar-container"></div>

            <!-- This container will become the editable. -->
            <div id="editor">
                <p>This is the initial editor content.</p>
            </div>

            <form action="../helpers/proces_editor_data.php" method="post">
                <input type="hidden" name="editorData" id="editorData">
                <button type="submit">Submit</button>
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