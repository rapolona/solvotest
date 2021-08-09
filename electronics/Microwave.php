<?php 

namespace Electronics;

class Microwave extends ElectronicItem 
{ 

    private $type = "microwave";

    public $price = 75;

	public function __construct($item)
	{
        $this->setPrice($item['price'] ?? $this->price);
        $this->setType($this->type);
        $this->setMaxExtra(0);
	}

}