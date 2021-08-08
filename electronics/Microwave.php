<?php 

namespace Electronics;

class Microwave extends ElectronicItem 
{ 

    private $type = "microwave";

	public function __construct($item)
	{
        $this->setPrice($item['price']);
        $this->setType($this->type);
	}

}