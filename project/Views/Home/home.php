<?php
    if(isset($_SESSION["uID"])) {
        $this->render("Shared", "header", ["css" => "home", "title" => "Home Page"]);
    } else {
        $this->render("Shared", "header", ["js" => "home", "css" => "home", "title" => "Home Page"]);
    }
?>

<div class="home-section">
    <?php foreach ($templates as $template): ?>
        <div class="template">
            <div class="image-container">
                <img src="<?php echo $template['file'];?>" alt="Template Image">
            </div>

            <div class="text-container">
                <p class="title"><?= "Title: " . $template['title']; ?></p>
                <p class="description"><?= $template['description']; ?></p>
                <label class="creator"><?= 'Creator ID: ' . $template['user_id']; ?></label>
                
                <form action="index.php?c=Template&a=printService" method="POST">
                    <input type="hidden" name="templateID" value="<?= $template['templateID']; ?>">
                    <input type="submit" value="View">
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php $this->render("Shared", "footer"); ?>