<?php 

namespace Electronics;

class Controller extends ElectronicItem 
{ 

    private $type = "controller";

    public $price = 25;

	public function __construct($item)
	{
        $this->setPrice($item['price'] ?? $this->price);
        $this->setType($this->type);
	}
	
}