<?php

require __DIR__."/vendor/autoload.php";

use App\CarrinhoCompra;
use App\item;
use App\Pedido;
use App\EmailService;

echo '<h3>Com SRP</h3>';
$pedido = new Pedido();
//------------------------
$item1 = new Item();
$item2 = new Item();

$item1->setDescricao('Porta copo');
$item1->setValor(4.55);

$item2->setDescricao('Lâmpada');
$item2->setValor(8.32);

//------------------------
echo '<h3>Pedido iniciado</h3>';
echo '<pre>';
print_r($pedido);
echo '</pre>';

//------------------------
$pedido->getCarrinhoCompra()->adicionarItem($item1);
$pedido->getCarrinhoCompra()->adicionarItem($item2);
//------------------------
echo '<h3>Pedido com itens</h3>';
echo '<pre>';
print_r($pedido);
echo '</pre>';

//------------------------
echo '<h3>Itens do carrinho</h3>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->getItens());
echo '</pre>';

//------------------------
echo '<h3>valor do pedido</h3>';


$total = 0;
foreach($pedido->getCarrinhoCompra()->getItens() as $key => $item){
    $total += $item->getValor();

}
echo $total;

//------------------------
echo '<h3>Carrinho está válido?</h3>';
echo $pedido->getCarrinhoCompra()->validadarCarrinho();

//------------------------
echo '<h3>Status pedido</h3>';
echo $pedido->getStatus();

//------------------------
echo '<h3>Confirmar pedido</h3>';
echo $pedido->Confirmar();


//------------------------
echo '<h3>Status pedido</h3>';
echo $pedido->getStatus();

//------------------------
echo '<h3>E-mail</h3>';
if($pedido->getStatus() == 'confirmado'){
    echo EmailService::dispararEmail();
}











/* $carrinho1 = new CarrinhoCompra();
print_r($carrinho1->exibirItens());

echo 'valor total:'. $carrinho1->exibirValorTotal();

$carrinho1->adicionarItem('Bicicleta', 750.10);
$carrinho1->adicionarItem('Geladeira', 1950.15);
$carrinho1->adicionarItem('Tapete', 350.20);

$carrinho1->adicionarItem('Televisão', 3750.10);
echo "<br />";
print_r($carrinho1->exibirItens());
echo "<br />";

$carrinho1->exibirValorTotal();
echo 'Valor total recalculado:'. $carrinho1->exibirValorTotal();

echo "<br />";
echo 'Status:'. $carrinho1->exibirStatus();


echo "<br />";
if($carrinho1->confirmarPedido()){
    echo 'Pedido realizado com sucesso!';
} else {
    echo 'erro na confirmação do pedido. Carrinho vazio';
}

echo "<br />";
echo 'Status:'. $carrinho1->exibirStatus(); */