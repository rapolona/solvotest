<?php 

namespace Electronics;

class Television extends ElectronicItem 
{ 

	private $type = "television";

	public $price = 100;

	public function __construct($item)
	{
        $this->setPrice($item['price'] ?? $this->price);
        $this->setType($this->type);
        $this->setMaxExtra(0);
        $this->setExtras($item['extras']);
	}
}
