<?php

require 'form.php';
require 'html.php';

$html = new Html();
$form = new Form($_POST);

echo $html->head();
echo $html->metaInit();
echo $html->metaDesc('PHP OOP');
echo $html->metaKey('PHP, Object Oriented Programming');
echo $html->css('style');
echo $html->script('app');
echo $html->body();
echo $html->img('php-oop.jpg');
echo $html->a('https://www.php.net/', 'PHP');

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

echo $html->close();

?>