<?php
namespace controlfunctions;
class Order
{
    protected $productCart;
    protected $cart;
    public function __construct( Cart $cart)
    {
        $this->cart = $cart;
        $this->productCart = $cart->productCart;
    }
    public function getOrder()
    {
        ?>

        <table>
            <thead><tr> <td>Бренд</td> <td>Модель</td> <td>Цвет</td> <td>Цена</td> <td>Количество</td> <td>Всего</td> </tr></thead>

            <tbody>
            <?php foreach ($this->productCart as $productArray): ?>

                <tr> <td><?=$this->cart->getPositionProperty($productArray, 'brand')?></td> <td><?=$this->cart->getPositionProperty($productArray, 'model')?></td> <td><?=$this->cart->getPositionProperty($productArray, 'color')?></td> <td><?=$this->cart->getPositionProperty($productArray, 'price')?></td> <td><?=$this->cart->getPositionProperty($productArray, 'quantity')?></td> <td><?=$this->cart->countTotalPositionPrice($productArray)?></td> </tr>
            <?php endforeach;
            $this->cart->countTotalPrice(); ?>
            </tbody>

            <tfoot> <tr> <td colspan="5">Общая сумма заказа</td> <td><?=$this->cart->totalPrice?></td> </tr>  </tfoot>


        </table>

    <?php }
}