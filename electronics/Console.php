<?php 

namespace Electronics;

class Console extends ElectronicItem 
{ 

	private $type = "console";

	public function __construct($price)
	{
        $this->setPrice($price);
        $this->setType($this->type);
        $this->setMaxExtra(4);
	}
}
