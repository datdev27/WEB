<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    echo "THE GAME";
    
    if(isset($_GET["response"])) {
        if($_GET["response"] == "yes") {
            echo " HAS BEEN QUITTED";
        } elseif($_GET["response"] == "no") {
            echo " WILL BE CONTINUED IN 3 SECONDS";
        }
    }
    
    echo "<br>AFTER IF STATEMENT";
    ?>
</body>
</html>
