<?php 

namespace Electronics;

class Television extends ElectronicItem 
{ 

	public function __construct()
	{
        $this->setPrice(200);
        $this->setMaxExtra(0);
	}
}
