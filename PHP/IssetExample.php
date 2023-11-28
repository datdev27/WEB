<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['add']))
    {
        $result = $_GET["firstNumber"] + $_GET["secondNumber"];
        echo $result;
    }
    elseif (isset($_GET['minus']))
    {
        $result = $_GET["firstNumber"] - $_GET["secondNumber"];
        echo $result;
    }
    elseif (isset($_GET['multiply']))
    {
        $result = $_GET["firstNumber"] * $_GET["secondNumber"];
        echo $result;
    }
    elseif (isset($_GET['divide']))
    {
        $result = $_GET["firstNumber"] / $_GET["secondNumber"];
        echo $result;
    }
    
    ?>
</body>
</html>