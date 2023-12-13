<?php
    if(isset($_SESSION["uID"])) {
        $this->render("Shared", "header", ["css" => "home", "title" => "Home Page"]);
    } else {
        $this->render("Shared", "header", ["js" => "home", "css" => "home", "title" => "Home Page"]);
    }
?>

    <div class="home-section">
        <?php
            foreach($templates as $template) {
                // $tags = $template->getTemplateTags($template["templateID"]);
                // var_dump($tags);
                var_dump($template);
                echo $template["templateID"];
        ?>
                <div class="template">
                    <div class="image-container">
                        <!-- TODO: change template db structure and add $filepath here -->
                        <img src="Images/sonic.jpeg" alt="Template Here">
                        <div class="tags">
                            <label class="tag">#fantasy</label>
                            <label class="tag">#sonic</label>
                            <label class="tag">#funny</label>
                        </div>
                    </div>
                    <div class="text-container">
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus magna, lobortis eget varius eu, accumsan nec orci. Nulla facilisi. Mauris pellentesque id mi nec tincidunt. Nam et tristique sapien, et efficitur nulla.</p>
                        <label class="creator">DatPika</label>
                        <input type=submit value="Add to Cart">
                    </div>
                </div>
        <?php } ?>
    </div>

<?php $this->render("Shared", "footer"); ?>