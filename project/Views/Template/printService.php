<?php $this->render("Shared", "header", ['css' => 'printService', "title" => "Print Service Page"]); ?>

<?php if (isset($template)) { ?>
        <div class="print-service-section">
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
                    <p>>> Add Comment! <<</p>
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