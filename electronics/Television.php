<?php 

namespace Electronics;

class Television extends ElectronicItem 
{ 

	private $type = "television";

	public function __construct($item)
	{
        $this->setPrice($item['price']);
        $this->setType($this->type);
        $this->setMaxExtra(0);
	}
}
