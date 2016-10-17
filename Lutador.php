<?php

class Lutador {

    private $nome;
    private $nacionalidade;
    private $idade;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    public function __construct($nome, $nacionalidade, $idade, $peso, $vitoria, $derrota, $empate) {
        $this->setNome($nome);
        $this->setNacionalidade($nacionalidade);
        $this->setIdade($idade);
        $this->setPeso($peso);
        $this->setVitorias($vitoria);
        $this->setDerrotas($derrota);
        $this->setEmpates($empate);
    }

    public function apresentar() {
        echo '-------Apresentação-------';
        echo '<br>';
        echo 'Nome:' . $this->getNome();
        echo '<br>';
        echo 'Idade:' . $this->getIdade();
        echo '<br>';
        echo 'Peso:' . $this->getPeso();
        echo '<br>';
        echo 'Nacionalidade:' . $this->getNacionalidade();
        echo '<br>';
        echo 'Vitorias:' . $this->getVitorias();
        echo '<br>';
        echo 'Derrotas:' . $this->getDerrotas();
        echo '<br>';
        echo 'Empates:' . $this->getEmpates();
        echo '<br>';
        echo 'Categoria:' . $this->getCategoria();
        echo '<br>';
        echo '----------------------------------';
    }

    public function status() {
        echo '<br>';
        echo 'Status do Lutador: ' . $this->getNome() . ' nacionalizado ' . $this->getNacionalidade() . ' categoria: ' . $this->getCategoria() . ' cartel de ' . $this->getVitorias() . ' Vitoria(s), ' .
        $this->getDerrotas() . ' Derrota(s) e ' . $this->getEmpates() . ' Empate(s)';
        echo '<br>';
        echo'===============================================================================================';
    }

    public function ganharLuta() {

        $this->setVitorias($this->getVitorias() + 1);
    }

    public function perderLuta() {

        $this->setDerrotas($this->getDerrotas() + 1);
    }

    public function empatarLuta() {
        $this->setEmpates($this->getEmpates() + 1);
    }

    //---------------------------------------------------------------------------

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getIdade() {
        return $this->idade;
    }

    function getPeso() {
        return $this->peso;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getVitorias() {
        return $this->vitorias;
    }

    function getDerrotas() {
        return $this->derrotas;
    }

    function getEmpates() {
        return $this->empates;
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setPeso($peso) {
        $this->peso = $peso;
        $this->setCategoria($peso);
    }

    function setCategoria($peso) {
        if ($peso < 40) {
            $this->categoria = ' Desqualificado';
        } elseif ($peso < 60) {
            $this->categoria = ' Peso Pena';
        } elseif ($peso < 120) {
            $this->categoria = ' Peso Galo';
        } elseif ($peso < 150) {
            $this->categoria = ' Peso Pesado';
        } else {
            $this->categoria = ' Invalido para lutar';
        }
       
    }

    function setVitorias($vitorias) {
        $this->vitorias = $vitorias;
    }

    function setDerrotas($derrotas) {
        $this->derrotas = $derrotas;
    }

    function setEmpates($empates) {
        $this->empates = $empates;
    }

}
