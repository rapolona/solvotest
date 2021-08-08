<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./autoload.php');


class ElectronicItems {

	private $items = array();
	
	public function __construct(array $items)
	{
        $this->items = $items;
	}

	public function getSortedItems($type)  
	{  
		$sorted = array(); 
		return ksort($sorted, SORT_NUMERIC); 
	}

    public function getItemsByType($type)
    {    /*
    	if (in_array($type, ElectronicItem::$types))  {   
    		$callback = function($item) use ($type)  
    		{  return $item->type == $type;   } 
    	}*/
    }

}

$order = [
    [
		'type' => 'console',
    	'qty' => 1,
    	'price' => 100,
    	'extras' => [
    		['type' => 'controller', 'qty' => 2, 'price' => 20],
    		['type' => 'controller', 'qty' => 2, 'price' => 15, 'wired' => true]
    	]
    ],
    [
		'type' => 'television',
    	'qty' => 1,
    	'price' => 300,
    	'extras' => [
    		['type' => 'controller', 'qty' => 2, 'price' => 20]
    	]
    ],
    [
		'type' => 'television',
    	'qty' => 1,
    	'price' => 320,
    	'extras' => [
    		['type' => 'controller', 'qty' => 1, 'price' => 20]
    	]
    ],
    [
		'type' => 'microwave',
    	'qty' => 1,
    	'price' => 500
    ]

];


