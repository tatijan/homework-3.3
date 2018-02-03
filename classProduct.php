<?php
namespace controlfunctions;
abstract class Product extends \general\GeneralInfo implements \general\PricingData, \general\ProductInfo
{
    protected $price;

    protected $discount = 0;
    static $categoryDiscount = 0;
    protected $deliveryCost = 250;
    protected $title;
    protected $description;
    protected $photoPath;
    public function __construct($brand, $model, $color, $price )
    {
        $this->brand = $brand;
        $this->model =$model;
        $this->color = $color;
        $this->price = $price;
        try
        {
            if ($price <= 0)
            {
                throw new \Exception('Конструткор продукта: Вы ввели некорректную цену! Вам не удастстя положить товар в корзину!'.'<br>');
            }
        } catch (\Exception $e) {echo $e->getMessage(); }
    }
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }
    public function setDeliveryCost($deliveryCost)
    {
        $this->deliveryCost = $deliveryCost;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    public function setPhotoPath($photoPath)
    {
        $this->photo = $photoPath;
        return $this;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    public function getDeliveryCost()
    {
        $this->checkDeliveryCost();
        return $this->deliveryCost;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPhotoPath()
    {
        return $this->photoPath;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getFinalPrice()
    {
        $this->biggerDiscount();
        return $this->price * (1 - $this->discount / 100);
    }
    public function checkDeliveryCost()
    {
        if($this->hasDiscount())
        {
            $this->deliveryCost = 250;
        } else
        {
            $this->deliveryCost = 300;
        }
    }
    protected function hasDiscount()
    {
        if ($this->discount > 0) return true; else return false;
    }
    public function biggerDiscount(){}
}