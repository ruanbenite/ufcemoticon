<?php

include_once 'Lutador.php';
include_once 'Luta.php';

$lutador[0] = new Lutador('Ruan', 'Brasileiro', '25', '50', '20', '0', '1');
$lutador[1] = new Lutador('Carlos', 'Tailandes', '25', '50', '10', '0', '1');
$lutador[2] = new Lutador('Rafael', 'Japones', '25', '119', '15', '0', '1');
$lutador[3] = new Lutador('Miguel', 'Mexicano', '25', '119', '10', '0', '1');
$lutador[4] = new Lutador('Ruan2', 'Mexicano', '25', '140', '10', '0', '1');
$lutador[5] = new Lutador('Ruan3', 'Brasileiro', '25', '140', '20', '0', '1');
     
//$lutador[0]->apresentar();
echo '<br>';
//$lutador[1]->apresentar();
//$lutador[0]->getCategoria();
//$lutador[1]->getCategoria();

$luta = new Luta();

$luta->marcarLuta($lutador[0], $lutador[1]);
$luta->marcarLuta($lutador[2], $lutador[3]);
$luta->marcarLuta($lutador[4], $lutador[5]);
$luta->marcarLuta($lutador[0], $lutador[1]);

$luta->marcarLuta($lutador[2], $lutador[3]);
$luta->marcarLuta($lutador[4], $lutador[5]);
//$luta->marcarLuta($lutador[2], $lutador[3]);
//$luta->marcarLuta($lutador[4], $lutador[5]);
//$luta->marcarLuta($lutador[2], $lutador[3]);
//$luta->marcarLuta($lutador[1], $lutador[1]);
//$luta->marcarLuta($lutador[1], $lutador[5]);
//$luta->marcarLuta($lutador[1], $lutador[1]);
$luta->lutar();

//$lutador[0]->status();
//$lutador[1]->status();



