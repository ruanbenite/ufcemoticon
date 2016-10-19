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
    private $desafiadoArrayObj;
    private $desafiadorArrayObj;

    function marcarLuta($l1, $l2) {

        if (($l1->getCategoria() === $l2->getCategoria()) && ($l1 != $l2)) {
            
            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);
            //echo 'asdbgasduaisdonjaidjoaisdas'.$this->getDesafiado($l1);
            $this->desafiadoArray[] = ($this->getDesafiado()->getNome());
            $this->desafiadorArray[] = ($this->getDesafiador()->getNome());
            $this->desafiadoArrayObj[] = ($l1);
            $this->desafiadorArrayObj[] = ($l2);
           
            echo'<br><pre>';
            echo'ELE PUXOU '.$this->desafiadoArrayObj[0]->getNome();
            //print_r($l1);
            //print_r($this->desafiadoArrayObj[0]->getNome());
             
            echo '<br>contando'.count($this->desafiadorArrayObj);
               echo'</pre>';
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
         */
        if ($this->desafiadorArray < 0) {
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
        } if (count($this->desafiadoArrayRecusado) < 0) {
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

        echo '<pre>Recusado ';
        echo 'count($this->desafiadorArray)' . count($this->desafiadoArrayRecusado);
        for ($posicao2 = 0; $posicao2 < count($this->desafiadoArrayRecusado); $posicao2++) {
            echo '<br>';
            print_r($this->desafiadoArrayRecusado[$posicao2]);
          
            echo ' x ';
            print_r($this->desafiadorArrayRecusado[$posicao2]);
          
            chamarLutar($param1, $parm2);
        }
        echo '<br> ';
        echo '<br> ';

        echo'aceito';
        echo 'count($this->desafiadorArray)' . count($this->desafiadorArray);

        for ($posicao1 = 0; $posicao1 < count($this->desafiadorArray); $posicao1++) {
            echo '<br> ';
            print_r($this->desafiadoArray[$posicao1]);
            echo ' x ';
            print_r($this->desafiadorArray[$posicao1]);
        }
        //chamarLutar($this->desafiadorArray[$posicao1],$this->desafiadoArray[$posicao1]);
        echo '</pre>';
    }

    function chamarLutar($param1, $parm2) {
        echo 'to aqui ó';
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
