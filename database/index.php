<?php

include_once 'external.php';
include_once 'database.php';
include_once 'user.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase</title>
</head>
<body>
    <?php

    $usr = new User('localhost', $user, $pass, 'becode');
    echo $usr->getData();

    ?>
</body>
</html>