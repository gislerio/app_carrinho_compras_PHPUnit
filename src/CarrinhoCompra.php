<?php

namespace App;

use App\item;

class CarrinhoCompra
{
    //atributos
    private $itens;

    //métodos
    public function __construct()
    {
        $this->itens = [];
    }

    public function getItens()
    {
        return $this->itens;
    }

    public function adicionarItem(Item $item)
    {
        array_push($this->itens, $item);
        return true;
    }

    public function validadarCarrinho()
    {
        return count($this->itens) > 0;
    }
}
