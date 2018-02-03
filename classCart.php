<?php
namespace controlfunctions;
class Cart
{
    protected $productCart = [];
    protected $totalPrice = 0;
    protected $totalProductPositions = 0;
    protected $totalProductQuantity = 0;
    public function __set($property, $value)
    {
        return null;
    }
    public function __get($property)
    {
        return $this->$property;
    }
    public function putProduct( Product $product, $quantity)
    {
        try
        {
            if( $product->getPrice() <= 0)
            {
                throw new \Exception('Объект корзина: Товар без цены не может быть помещен в корзину!'.'<br>');
            }
        } catch (\Exception $e) {echo $e->getMessage(); return false;}
        foreach($this->productCart as $key => $productArray)
        {
            if ($this->compareProductInCart($product, $productArray))
            {
                $this->productCart[$key]['quantity'] += $quantity;
                unset($product);
                $this->totalProductQuantity += $quantity;
                return true;
            }

        }
        $productInCart = clone $product;
        unset($product);
        $this->productCart[] = ['productObject' => $productInCart, 'brand' => $productInCart->brand, 'model' => $productInCart->model, 'color' => $productInCart->color, 'quantity' => $quantity, 'price' => $productInCart->getFinalPrice()];
        $this->totalProductQuantity += $quantity;
        $this->totalProductPositions += 1;
        return true;
    }
    protected function compareProductInCart($product, $productInCartArray)
    {
        if (get_class($product) === get_class($productInCartArray['productObject']) && $product->brand === $productInCartArray['brand'] && $product->model === $productInCartArray['model'] && $product->color === $productInCartArray['color'])

            return true; else return false;
    }
    public function removeProduct($product, $quantity)
    {
        foreach($this->productCart as $key => $productArray)
        {
            if ($this->compareProductInCart($product, $productArray))
            {
                if ($productArray['quantity'] <= $quantity)
                {

                    $this->totalProductQuantity -= $productArray['quantity'];
                    $this->totalProductPositions -= 1;
                    unset($this->productCart[$key]);
                    return true;
                } else
                {
                    $this->productCart[$key]['quantity'] = $this->productCart[$key]['quantity'] - $quantity;
                    $this->totalProductQuantity -= $quantity;
                    return true;
                }
            }
        }
        echo 'No such product in cart!';
        return false;
    }
    public function countTotalPrice()
    {
        $this->totalPrice = 0;
        foreach ($this->productCart as $productArray)
        {
            $this->totalPrice += $this->countTotalPositionPrice($productArray);
        }
    }
    public function countTotalPositionPrice($productArray)
    {
        return $totalPositionPrice = $productArray['price'] * $productArray['quantity'];
    }
    public function getPositionProperty($productArray, $property)
    {
        return $productArray[$property];
    }

}