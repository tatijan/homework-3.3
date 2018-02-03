<?php
namespace products\consoles;
class GameConsole extends \controlfunctions\Product
{
    protected $memorySize;
    static $categoryDiscount = 0;
    static $category = 'GameConsole';
    public function __construct($brand, $model, $color, $price, $memorySize)
    {
        parent::__construct($brand, $model, $color, $price);
        $this->memorySize = $memorySize;
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