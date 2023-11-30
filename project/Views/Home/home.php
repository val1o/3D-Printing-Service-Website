<?php
    if(isset($_SESSION["uID"])) {
        $this->render("Shared", "header", ["css" => "home", "title" => "Home Page"]);
    } else {
        $this->render("Shared", "header", ["js" => "home", "css" => "home", "title" => "Home Page"]);
    }
?>


    <div class="home-section">
        <img src="Images/3dprint.jpg" alt="Your Image" />
    </div>

<?php $this->render("Shared", "footer"); ?>