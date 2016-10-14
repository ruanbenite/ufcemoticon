<?php

include_once 'Lutador.php';

$lutador[0] = new Lutador('Ruan', 'Brasileiro', '25', '70', '20', '0', '1');
$lutador[1] = new Lutador('Carlos', 'Tailandes', '25', '70', '20', '0', '1');
$lutador[2] = new Lutador('Rafael', 'Japones', '25', '70', '20', '0', '1');
$lutador[3] = new Lutador('Miguel', 'Mexicano', '25', '70', '20', '0', '1');
     

$lutador[0]->apresentar();
$lutador[0]->status();
echo'<br>';
$lutador[1]->apresentar();
$lutador[1]->status();
echo'<br>';
$lutador[2]->apresentar();
$lutador[2]->status();
echo'<br>';
$lutador[3]->apresentar();
$lutador[3]->status();



