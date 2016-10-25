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
    public $array1;

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
            $this->array1[] = array($this->desafiadoArrayObj, $this->desafiadorArrayObj, array($this->getAprovada()));
           // echo '<br>to aqui oH ' . count($this->array1);
            
            for ( $i =0; $i < count($this->array1); $i++   ){
                
                for ( $j =0; $j < count($this->array1); $j++   ){
               
                //echo " nome do lutador " . $this->array1[$i][$j][0]->getNome();
                echo'<br>';
                echo'array i =['.$i.']['.$j.'[0] '.$this->array1[$i][$j][0]->getNome();
                }
              echo"<br>";
            //echo " nome do lutador " . $this->array1[$i][0][0]->getNome();
            }

            echo"<br> PASSANDO PELA MARCAR LUTA";
            //echo " nome do lutador " . $this->array1[0][1][0]->getNome();
            // echo'   '.count($array1);



            echo'<br><pre>';
           // print_r($this->$array1);
            // echo'estou aquiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii<br>';
            //echo'ELE PUXOU ' . $this->desafiadoArrayObj[0]->getNome();
            echo'<br>';

            //  print_r($this->desafiadoArrayObj[0]);

            echo'</pre>';
        } else {

            $this->setAprovada(false);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);
            $this->desafiadoArrayRecusado[] = ($this->getDesafiado()->getNome());
            $this->desafiadorArrayRecusado[] = ($this->getDesafiador()->getNome());
        }
    }

    function help($posicao1) {
        /* echo "<h1>CONTADOR DE LUTAS " . count($this->desafiadorArray) . "</h1>";
          foreach ($this->desafiadorArray as $valor) {
          echo 'CONTADOR DE LUTAS'.$this->desafiadoArray[$i];
          echo'<br>';
          $i++;
          }
         */
        /*if ($this->desafiadorArray < 0) {
            $ordemLuta = 1;
            for ($posicao1 = 0; $posicao1 < count($this->desafiadorArray); $posicao1++) {

                echo "<h2>";
                echo "Luta " . $ordemLuta . " entre <br>";
                echo "</h2>";
                echo "<h3>";
                echo " nome do lutador Desafiado " . $this->array1[$posicao1][1][0]->getNome();
                echo " nome do lutador DESAFIADOR " . $this->array1[$posicao1][2][0]->getNome();
                //echo "Desafiado " . $this->desafiadoArray[$posicao1] . "<br>";
                // echo "Desafiador " . $this->desafiadorArray[$posicao1] . "<br>";
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
  
         */
    }

    function lutar() {
        if (count($this->desafiadoArrayRecusado) > 0) {
            echo '<pre>Recusado ';
            echo 'count($this->desafiadoArrayRecusado)' . count($this->desafiadoArrayRecusado);
            for ($posicao2 = 0; $posicao2 < count($this->desafiadoArrayRecusado); $posicao2++) {
                echo '<br>';
                print_r($this->desafiadoArrayRecusado[$posicao2]);

                echo ' x ';
                print_r($this->desafiadorArrayRecusado[$posicao2]);
            }
            $this->chamarLutar();
        }
        echo '<br> ';
       
        if (count($this->array1) > 0) {
            echo'aceito';
            echo 'count($this->desafiadorArray)' . count($this->desafiadorArray);
/*
            for ($posicao1 = 0; $posicao1 < count($this->desafiadorArray); $posicao1++) {
                echo '<br> ';
                print_r($this->desafiadoArray[$posicao1]);
                echo' '.$this->array1[$posicao1][0][0]->getNome();
                echo ' x ';
                print_r($this->desafiadorArray[$posicao1]);
                echo' '.$this->array1[$posicao1][1][0]->getNome();
            }
            */
             echo' <h1>AQUI</h1>'.$this->array1[1][0][0]->getNome();
             echo' <h1>AQUI</h1>'.$this->array1[1][0][1]->getNome();
             echo' <h1>AQUI</h1>'.$this->array1[1][1][0]->getNome();
             echo' <h1>AQUI</h1>'.$this->array1[1][1][1]->getNome();
             
            echo'<pre> ===============';
           // print_r($this->array1);
            echo'</pre> ==============';
            $this->chamarLutar();
        }
        echo '</pre>';
    }

    function chamarLutar() {
        echo '<br><h1>'.count($this->array1).'</br></h1>' ;
        for ($posicao1 = 0; $posicao1 < count($this->array1); $posicao1++) {
            if ($this->array1[0][2] == 1) {
                $this->help($posicao1);
                echo '<br>';
                $this->array1[$posicao1][0][0]->apresentar();
                echo'<br>';
                $this->array1[$posicao1][1][0]->apresentar();
               
                $this->setRounds(rand(1, 5));
                $vencedor = rand(0, 2);
                switch ($vencedor) {
                    case 0:
                        echo'<br>';
                        echo'<h3>EMPATOU!!!</h3>';
                        $this->array1[$posicao1][0][0]->empatarLuta();
                        $this->array1[$posicao1][1][0]->empatarLuta();
                        break;
                    case 1:
                        echo'<br>';
                        echo'<h3>O vencedor foi ' . $this->getDesafiado()->getNome() . '</h3>';
                        echo'<br>';
                        echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                        $array1[$posicao1][0][0]->ganharLuta();
                        $array1[$posicao1][1][0]->perderLuta();
                        break;
                    case 2:
                        echo'<br>';
                        echo'<h3>O vencedor foi ' . $this->getDesafiador()->getNome() . '</h3>';
                        echo'<br>';
                        echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                        $array1[$posicao1][0][0]->perderLuta();
                        $array1[$posicao1][1][0]->ganharLuta();
                        break;
                }
            }
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
