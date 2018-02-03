<?php
namespace general;
interface ProductInfo
{
    public function setCategory($category);
    public function setTitle($title);
    public function setPhotoPath($photoPath);
    public function setDescription($description);
    public function getCategory();
    public function getTitle();
    public function getPhotoPath();
    public function getDescription();
}