<?php
    if(isset($_SESSION["uID"])) {
        $this->render("Shared", "header", ["css" => "home", "title" => "Home Page"]);
    } else {
        $this->render("Shared", "header", ["js" => "home", "css" => "home", "title" => "Home Page"]);
    }
?>


    <div class="home-section">
        <div class="template">
            <div class="image-container">
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
        <div class="template">
            <div class="image-container">
                <img src="Images/controller.jpg" alt="Template Here">
                <div class="tags">
                    <label class="tag">#gaming</label>
                    <label class="tag">#controller</label>
                </div>
            </div>
            <div class="text-container">
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus magna, lobortis eget varius eu, accumsan nec orci. Nulla facilisi. Mauris pellentesque id mi nec tincidunt. Nam et tristique sapien, et efficitur nulla.</p>
                <label class="creator">Valio</label>
                <input type=submit value="Add to Cart">
            </div>
        </div>
        <div class="template">
            <div class="image-container">
                <img src="Images/wheels.jpg" alt="Template Here">
                <div class="tags">
                    <label class="tag">#industrial</label>
                    <label class="tag">#student</label>
                </div>
            </div>
            <div class="text-container">
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam risus magna, lobortis eget varius eu, accumsan nec orci. Nulla facilisi. Mauris pellentesque id mi nec tincidunt. Nam et tristique sapien, et efficitur nulla.</p>
                <label class="creator">Someone</label>
                <input type=submit value="Add to Cart">
            </div>

            
            
        </div>
    </div>

<?php $this->render("Shared", "footer"); ?>