<?php $this->render("Shared", "header", ["title" => "Create Template Page"]); ?>

    <form action="index.php?c=Template&a=createTemplate" method="post">

        <label for="file">File Name:</label>
        <input type="text" name="file"><br>

        <label for="theme">Theme:</label>
        <input type="text" name="theme"><br>

        <label for="title">Title:</label>
        <input type="text" name="title"><br>

        <label for="description">Description:</label>
        <input type="text" name="description"><br>

        <input type="submit" value="Create Template">

    </form>

<?php $this->render("Shared", "footer"); ?>