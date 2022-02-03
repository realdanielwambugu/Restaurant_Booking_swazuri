<?php
require_once __DIR__ . '/public/index.php';

// base class
class Shape
{
    protected $width;

    protected $length;

    public function setWidth($w)
    {
        $this->width = $w;
    }

    public function setlength($l)
    {
        $this->length = $l;
    }

}



class Rectangle extends Shape
{

    public function calcArea()
    {
        return  $this->length * $this->width;
    }
}


class Triangle extends Shape
{

    public function calcArea()
    {
        return $this->length * $this->width * 0.5;
    }
}


// area Rectangle

$rectangle = new Rectangle;

$rectangle->setWidth(5);

$rectangle->setLength(10);

dump($rectangle->calcArea());

// area Triangle

$rectangle = new Triangle;

$rectangle->setWidth(8);

$rectangle->setLength(10);

dump($rectangle->calcArea());
