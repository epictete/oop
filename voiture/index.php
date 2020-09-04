<?php

require 'voiture.php';
require 'html.php';

$html = new Html();

echo $html->head();
echo $html->metaInit();
echo $html->metaDesc('Voitures');
echo $html->metaKey('Voitures');
echo $html->css('style');
echo $html->body();

// Instantiation
$a3 = new Voiture('BE 1-xcv-135', '2017-12-14', 125647, 'A3', 'Audi', 'Bleu', 1875, 'a3');
$a4 = new Voiture('FR 1-qsd-486', '2018-10-14', 68745, 'A4', 'Audi', 'Gris Anthracite', 1963, 'a4');
$a6 = new Voiture('NL 1-ghj-678', '2019-03-14', 95413, 'A6', 'Audi', 'Bleu nuit', 2048, 'a6');
$serie_1 = new Voiture('DE 1-iop-912', '2020-05-14', 42375, 'Série 1', 'BMW', 'Bleu ciel', 1888, 'serie_1');
$serie_3 = new Voiture('ES 1-ert-735', '2016-11-14', 64387, 'Série 3', 'BMW', 'Bleu', 2079, 'serie_3');
$mini = new Voiture('IT 1-klm-627', '2015-07-14', 135784, 'Cooper', 'Mini', 'Gris Souris', 1796, 'mini');
$golf = new Voiture('LU 1-qsd-363', '2014-09-14', 57891, 'Golf', 'VW', 'Blanc', 1857, 'golf');
$classe_a = new Voiture('BE 1-yui-789', '2018-02-14', 75468, 'Classe A', 'Mercedes', 'Gris Métallisé', 1823, 'classe_a');
$classe_c = new Voiture('DE 1-dfg-261', '2019-04-14', 34687, 'Classe C', 'Mercedes', 'Gris Métallisé', 2137, 'classe_c');

$voitures = [$a3, $a4, $a6, $serie_1, $serie_3, $mini, $golf, $classe_a, $classe_c];

// Display

foreach ($voitures as $voiture)
{
    echo $voiture->display();
}

echo $html->close();

?>