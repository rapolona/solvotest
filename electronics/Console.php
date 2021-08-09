<?php 

namespace Electronics;

class Console extends ElectronicItem 
{ 

	private $type = "console";

	public $price = 50;

	public function __construct($item)
	{
        $this->setPrice($item['price'] ?? $this->price);
        $this->setType($this->type);
        $this->setWired(isset($item['wired']));
        $this->setMaxExtra(4);
        $this->setExtras($item['extras']);
	}
}
