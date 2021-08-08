<?php 

namespace Electronics;

class Console extends ElectronicItem 
{ 

	public function __construct()
	{
        $this->setPrice(20);
        $this->setMaxExtra(4);
	}
}
