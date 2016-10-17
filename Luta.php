<?php

include_once 'Lutador.php';

class Luta {

    private $desafiador;
    private $desafiado;
    private $rounds;
    private $aprovada;

    function marcarLuta($l1, $l2) {
        if (($l1->getCategoria() === $l2->getCategoria()) && ($l1 != $l2)) {

            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);
        } else {
            $this->setAprovada(false);
            $this->setDesafiado(NULL);
            $this->setDesafiador(NULL);
        }
    }

    function lutar() {
        if ($this->getAprovada()) {
            $this->getDesafiado()->apresentar();
            $this->getDesafiador()->apresentar();
            $this->setRounds(rand(1, 5));
            $vencedor = rand(0, 2);
            echo 'varial'.$vencedor;
            switch ($vencedor) {
                case 0:
                    echo'<br>';
                    echo'<h3>EMPATOU!!!</h3>';
                    $this->getDesafiado()->empatarLuta();
                    $this->getDesafiador()->empatarLuta();
                    break;
                case 1:
                    echo'<br>';
                    echo'<h3>O vencedor foi '  . $this->getDesafiador()->getNome().'</h3>';
                     echo'<br>';
                    echo'<h3>A luta teve '  . $this->rounds.' Rounds </h3>';
                    $this->getDesafiado()->ganharLuta();
                    $this->getDesafiador()->perderLuta();
                    break;
                case 2:
                    echo'<br>';
                    echo'<h3>O vencedor foi '  . $this->getDesafiador()->getNome().'</h3>';
                     echo'<br>';
                    echo'<h3>A luta teve '  . $this->rounds.' Rounds </h3>';
                    $this->getDesafiado()->perderLuta();
                    $this->getDesafiador()->ganharLuta();
                    break;
            }
        } else {
            echo "<p>luta não pode acontecer</p>";
        }
    }

    function getDesafiador() {
        return $this->desafiador;
    }

    function getDesafiado() {
        return $this->desafiado;
    }

    function getRounds() {
        return $this->rounds;
    }

    function getAprovada() {
        return $this->aprovada;
    }

    function setDesafiador($desafiador) {
        $this->desafiador = $desafiador;
    }

    function setDesafiado($desafiado) {
        $this->desafiado = $desafiado;
    }

    function setRounds($rounds) {
        $this->rounds = $rounds;
    }

    function setAprovada($aprovada) {
        $this->aprovada = $aprovada;
    }

}
