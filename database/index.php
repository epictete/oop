<?php

include_once 'external.php';
include_once 'database.php';
include_once 'user.php';
include_once 'form.php';

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

    $form = new Form($_POST);
    echo $form->formStart('#', 'post');
    echo $form->input('username');
    echo $form->input('password');
    echo $form->input('email');
    echo $form->submit();
    echo $form->formEnd();

    $object = new User('localhost', $user, $pass, 'becode');
    $object->setUsers($_POST['username'], $_POST['password'], $_POST['email']);
    // $object->updateUsername('john', 'johnjohn');
    // $object->updateEmail('john@mail.com', 'johnjohn@mail.com');
    // $object->deleteUsers('john');

    ?>

</body>
</html>