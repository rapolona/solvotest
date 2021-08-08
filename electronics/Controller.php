<?php 

namespace Electronics;

class Controller extends ElectronicItem 
{ 

    private $type = "controller";

	public function __construct($item)
	{
        $this->setPrice($item['price']);
        $this->setType($this->type);
	}
	
}