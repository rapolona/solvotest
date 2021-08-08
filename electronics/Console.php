<?php 

namespace Electronics;

class Console extends ElectronicItem 
{ 

	private $type = "console";

	public function __construct($item)
	{
        $this->setPrice($item['price']);
        $this->setType($this->type);
        $this->setWired(isset($item['wired']));
        $this->setMaxExtra(4);
	}
}
