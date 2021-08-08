<?php 

namespace Electronics;

class Microwave extends ElectronicItem 
{ 

    private $type = "microwave";

	public function __construct($price)
	{
        $this->setPrice($price);
        $this->setType($this->type);
	}

}