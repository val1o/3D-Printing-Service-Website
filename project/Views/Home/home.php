<?php
    if(isset($_SESSION))
    $this->render("Shared", "header", ["js" => "home", "css" => "styles", "title" => "Home Page"]);
?>

    <div class="home-section">
        <img src="Images/3dprint.jpg" alt="Your Image" />
    </div>

<?php $this->render("Shared", "footer"); ?>