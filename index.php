<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./autoload.php');


class ElectronicItems {

	private $items = array();

	private $order = array();

	private $total = 0;
	
	public function __construct(array $items)
	{
        $this->items = $items;
	}

	public function getSortedItems()  
	{  
		$sorted = $this->items; 
		return ksort($sorted, SORT_NUMERIC); 
	}

	public function processOrder()
	{
		$total = 0;
		foreach($this->items as $item){
			$newItem = $this->processItem($item);
			$newItem['subtotal'] = ($item['qty'] * $item['price']) + $newItem['extras']['total'];
			array_push($this->order, $newItem);
			$this->total += $newItem['subtotal'];
		}
    
        return ['order' => $this->order, 'total' => $this->total];

	}

	private function processItem($item)
	{
		$newItem = [];
		switch($item['type']){
			case 'console': 
			    $orderItem= new Electronics\Console($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
			case 'television': 
			    $orderItem = new Electronics\Television($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
			case 'microwave': 
			    $orderItem = new Electronics\Microwave($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
            default:
                return ['error' => 'item type ' . $item['type'] .' not available'];
		}
		return $newItem;
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

// Process Order
$processOrder = new ElectronicItems($order);


print_r($processOrder->processOrder());
