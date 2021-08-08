<?php 

namespace Electronics;

class Television extends ElectronicItem 
{ 

	private $type = "television";

	public function __construct($price)
	{
        $this->setPrice($price);
        $this->setType($this->type);
        $this->setMaxExtra(0);
	}
}
