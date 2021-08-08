<?php 

namespace Electronics;

class Controller extends ElectronicItem 
{ 

    private $type = "controller";

	public function __construct($price)
	{
        $this->setPrice($price);
        $this->setType($this->type);
	}
	
}