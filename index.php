<?php

require 'form.php';

$form = new Form($_POST);

echo $form->formStart('#', 'post');
echo $form->input('username');
echo $form->input('password');
echo $form->selectStart('subject');
echo $form->selectOption('1');
echo $form->selectOption('2');
echo $form->selectOption('3');
echo $form->selectEnd();
echo $form->textArea('message', 5, 50);
echo $form->radio('gender', 'male');
echo $form->radio('gender', 'female');
echo $form->checkbox('mood1', 'happy', 'I am feeling happy!');
echo $form->checkbox('mood2', 'sad', 'I am feeling sad!');
echo $form->submit();
echo $form->formEnd();

?>