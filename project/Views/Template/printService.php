<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<PRE>";
    var_dump($data);
    echo "</PRE>";

    if (isset($template)) {
        // Step 3: Display the fetched details in HTML
        ?>
        <div class="template-details">
            <div>
                <strong>Template ID:</strong> <?php echo $template['templateID']; ?>
            </div>
            <div>
                <strong>Description:</strong> <?php echo $template['description']; ?>
            </div>
            <div>
                <strong>Creator:</strong> <?php echo $template['user_id']; ?>
            </div>
            <!-- Add other details you want to display -->
        </div>
        <?php
    } else {
        // Handle the case when template details are not available
        echo "Template details not found.";
    }
    ?>


</body>

</html>