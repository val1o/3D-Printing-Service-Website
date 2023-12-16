<?php $this->render("Shared", "header", ['css' => 'printService', "title" => "Print Service Page"]); ?>

<?php if (isset($template)) { ?>
        <div class="print-service-section">
            <!-- If an error message was sent through render, display it -->
            <?php if(isset($error)) echo $error;?>

            <div class="template">
                <div class="image-container">
                    <img src="<?php echo $template['file'];?>" alt="Template Image">
                </div>

                <div class="text-container">
                    <p class="title"><?php echo "Title: " . $template['title']; ?></p>
                    <p class="description"><?php echo $template['description']; ?></p>
                    <label class="creator"><?php echo 'Creator ID: ' . $template['user_id']; ?></label>
                    
                    <form action="index.php?c=Template&a=sendToCheckout" method="post">
                        <input type="hidden" name="templateID" value="<?= $template['templateID']; ?>">
                        <input type="submit" value="Confirm Purchase">
                    </form>
                </div>
            </div>
            <div class="comments">
                <div class="add">
                    <form action="index.php?c=Comment&a=createComment" method="post">
                        <input type="hidden" name="templateID" value="<?= $template['templateID']; ?>">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['uID']; ?>">
                        <input type="text" name="header" placeholder="Header" required>
                        <input type="text" name="body" placeholder="Body" required>
                        <input type="submit" value=">> Add Comment! <<">
                    </form>
                </div>
                <?php
                    if(!empty($comments)) {
                        //If there are comments under the template
                        foreach ($comments as $comment):
                            $author = $user->getUserByuID($comment['user_id']);
                ?>
                            <div class="comment">
                                <div class="about">
                                    <p class="author"><?= $author['username'] ?> | </p>
                                    <p class="date-created"><?= $comment['timeOfCreation'] ?></p>
                                </div>
                                <div class="content">
                                    <p class="header"><?= $comment['header'] ?></p>
                                    <p class="body"><?= $comment['body'] ?></p>
                                </div>
                            </div>
                <?php
                        endforeach;
                    } else {
                        //If there are no comments yet ?>
                        <div class="no-comment">
                            <p>There are no comments yet!</p>
                        </div>
                <?php } ?>
            </div>
        </div>

<?php
    } else {
        // Handle the case when template details are not available
        echo "Template details not found.";
    }
?>

<?php $this->render("Shared", "footer"); ?>