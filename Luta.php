<?php

include_once 'Lutador.php';

class Luta {

    private $desafiador;
    private $desafiado;
    private $rounds;
    private $aprovada;
    private $desafiadoArray;
    private $desafiadorArray;
    private $desafiadoArrayRecusado;
    private $desafiadorArrayRecusado;

    function marcarLuta($l1, $l2) {

        if (($l1->getCategoria() === $l2->getCategoria()) && ($l1 != $l2)) {

            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);
            $this->desafiadoArray[] = ($this->getDesafiado()->getNome());
            $this->desafiadorArray[] = ($this->getDesafiador()->getNome());
        } else {

            $this->setAprovada(false);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);
            $this->desafiadoArrayRecusado[] = ($this->getDesafiado()->getNome());
            $this->desafiadorArrayRecusado[] = ($this->getDesafiador()->getNome());
        }
    }

    function help() {
        /* echo "<h1>CONTADOR DE LUTAS " . count($this->desafiadorArray) . "</h1>";
          foreach ($this->desafiadorArray as $valor) {
          echo 'CONTADOR DE LUTAS'.$this->desafiadoArray[$i];
          echo'<br>';
          $i++;
          }
         */if ($this->getAprovada()) {
            $ordemLuta = 1;
            for ($posicao1 = 0; $posicao1 < count($this->desafiadorArray); $posicao1++) {

                echo "<h2>";
                echo "Luta " . $ordemLuta . " entre <br>";
                echo "</h2>";
                echo "<h3>";
                echo "Desafiado " . $this->desafiadoArray[$posicao1] . "<br>";
                echo "Desafiador " . $this->desafiadorArray[$posicao1] . "<br>";
                echo "</h3>";
                $ordemLuta ++;
            }
        } else {
            echo'Lutas canceladas por incompatibilidades';
            for ($posicao1 = 0; $posicao1 < count($this->desafiadoArrayRecusado); $posicao1++) {
                echo "<h4>";
                echo "Desafiado " . $this->desafiadoArrayRecusado[$posicao1] . "<br>";
                echo "Desafiador " . $this->desafiadorArrayRecusado[$posicao1] . "<br>";
                echo "</h42>";
            }
        }
    }

    function lutar() {
        if ($this->getAprovada()) {
            $this->help();
            $this->getDesafiado()->apresentar();
            $this->getDesafiador()->apresentar();
            $this->setRounds(rand(1, 5));
            $vencedor = rand(0, 2);
            echo 'varial' . $vencedor;
            switch ($vencedor) {
                case 0:
                    echo'<br>';
                    echo'<h3>EMPATOU!!!</h3>';
                    $this->getDesafiado()->empatarLuta();
                    $this->getDesafiador()->empatarLuta();
                    break;
                case 1:
                    echo'<br>';
                    echo'<h3>O vencedor foi ' . $this->getDesafiado()->getNome() . '</h3>';
                    echo'<br>';
                    echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                    $this->getDesafiado()->ganharLuta();
                    $this->getDesafiador()->perderLuta();
                    break;
                case 2:
                    echo'<br>';
                    echo'<h3>O vencedor foi ' . $this->getDesafiador()->getNome() . '</h3>';
                    echo'<br>';
                    echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                    $this->getDesafiado()->perderLuta();
                    $this->getDesafiador()->ganharLuta();
                    break;
            }
        } else {


            $this->help();
        }
        echo '<pre>';
        print_r($this->desafiadoArrayRecusado);
        echo '<br>';
        print_r($this->desafiadorArrayRecusado);
        echo '<br>';
        echo'=================';
        echo '<br>';
        print_r($this->desafiadorArray);
        print_r($this->desafiadoArray);
        echo '</pre>';
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
