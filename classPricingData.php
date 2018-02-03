<?php
namespace general;
interface PricingData
{

    public function getPrice();
    public function getFinalPrice();
    public function getDeliveryCost();
    public function setPrice($price);
    public function setDiscount($discount);
    static function setCategoryDiscount($categoryDiscount);
    public function biggerDiscount();
}