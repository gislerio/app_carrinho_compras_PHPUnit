<?php

use App\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testEstadoInicialItel()
    {
        $item = new Item();

        //asserções do PHPUnit
        $this->assertEquals('', $item->getDescricao());
        $this->assertEquals(0, $item->getValor());
    }

    public function testGetsetDescricao()
    {
        $descricao = 'Cadeira de plástico';

        $item = new Item();
        $item->setDescricao($descricao);
        $this->assertEquals($descricao, $item->getDescricao());

    }
    public function testGetsetValor()
    {
        $valor = 35.42;

        $item = new Item();
        $item->setValor($valor);
        $this->assertEquals($valor, $item->getValor());

    }

    public function testItemValido()
    {
        $item = new Item();
        //seria submeter um item válido para o teste e retornar ok
        $item->setValor(55);
        $item->setDescricao('Cadeira de plástico');
        $this->assertEquals(true, $item->itemValido());
        //seria submeter um item inválido para o teste e retorna false (descrição)
        $item->setValor(55);
        $item->setDescricao('');
        $this->assertEquals(false, $item->itemValido());
        //seria submeter um item inválido para o teste e retornar false (valor)
        $item->setValor(0);
        $item->setDescricao('Cadeira de plástico');
        $this->assertEquals(false, $item->itemValido());

        $item->setValor(0);
        $item->setDescricao('');
        $this->assertEquals(false, $item->itemValido());
    }


}
