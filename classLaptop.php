<?php
namespace products\laptops;
class Laptop extends \controlfunctions\Product
{
    protected $OS;
    static $categoryDiscount = 0;
    static $category = 'Laptop';
    public function __construct($brand, $model, $color, $price, $OS)
    {
        parent::__construct($brand, $model, $color, $price);
        $this->OS = $OS;
    }
    static function setCategoryDiscount($categoryDiscount)
    {
        self::$categoryDiscount = $categoryDiscount;
    }
    public function biggerDiscount()
    {

        if ($this->discount < self::$categoryDiscount)
        {
            $this->discount = self::$categoryDiscount;
        }
    }
}
