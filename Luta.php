<?php

include_once 'Lutador.php';

class Luta {

    private $desafiador;
    private $desafiado;
    private $rounds;
    private $aprovada;
    private $ArrayRecusado;
    private $ArrayAceitos;
    public $array1;

    function marcarLuta($l1, $l2) {

        if (($l1->getCategoria() === $l2->getCategoria()) && ($l1 != $l2)) {

            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);

            $this->ArrayAceitos[] = ($l1);
            $this->ArrayAceitos[] = ($l2);
        } else {

            $this->setAprovada(false);
            $this->setDesafiado($l1);
            $this->setDesafiador($l2);

            $this->ArrayRecusado[] = ($l1);
            $this->ArrayRecusado[] = ($l2);
        }
    }

    function lutar() {
        if (count($this->ArrayRecusado) > 0) {
            echo '<pre>Recusado ';
            for ($posicao2 = 0; $posicao2 < count($this->ArrayRecusado); $posicao2++) {
                echo '<br>';
                print_r($this->ArrayRecusado[$posicao2]);

                echo ' x ';
                print_r($this->ArrayRecusado[$posicao2]);
            }
            $this->chamarLutar();
        }

        if (count($this->ArrayAceitos) > 0) {
            echo'Lutas Aprovadas para essa noite';

            for ($posicao = 0; $posicao < count($this->ArrayAceitos); $posicao++) {
                echo '<br>';
                print_r($this->ArrayAceitos[$posicao]->getNome());
                $posicao++;
                echo ' x ';
                print_r($this->ArrayAceitos[$posicao]->getNome());
            }

            $this->chamarLutar();
        }
        echo '</pre>';
    }

    function chamarLutar() {
        $variavel = count($this->ArrayAceitos);
        $ordemluta = 1;
        for ($posicao1 = 0; $posicao1 <= $variavel; $posicao1++) {
            //$this->help($posicao1);
            echo'<h3> Luta UFCMoticon n°' . $ordemluta . '</h3>';
            echo '<br>';
            $this->ArrayAceitos[$posicao1]->apresentar();
            echo'<br>';
            $posicao1 ++;
            $this->ArrayAceitos[$posicao1]->apresentar();
            $this->setRounds(rand(1, 5));
            $vencedor = rand(0, 2);
            switch ($vencedor) {
                case 0:
                    echo'<br>';
                    echo'<h3>EMPATOU!!!</h3>';
                    $this->ArrayAceitos[$posicao1]->empatarLuta();
                    $this->ArrayAceitos[$posicao1 + 1]->empatarLuta();
                    break;
                case 1:
                    echo'<br>';
                    echo'<h3>O vencedor foi ' . $this->getDesafiado()->getNome() . '</h3>';
                    echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                    $this->ArrayAceitos[$posicao1]->ganharLuta();
                    $this->ArrayAceitos[$posicao1 + 1]->perderLuta();
                    break;
                case 2:
                    echo'<br>';
                    echo'<h3>O vencedor foi ' . $this->getDesafiador()->getNome() . '</h3>';
                    echo'<h3>A luta teve ' . $this->rounds . ' Rounds </h3>';
                    $this->ArrayAceitos[$posicao1]->perderLuta();
                    $this->ArrayAceitos[$posicao1 + 1]->ganharLuta();
                    break;
            }
            $ordemluta ++;
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
