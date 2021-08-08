<?php 

require_once('./autoload.php');

class ElectronicItems {

	private $items = array();
	
	public function __construct(array $items)
	{
        $this->items = $items;
	}


}

