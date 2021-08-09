<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// LOAD CLASSES
require_once('./autoload.php');
require_once('./ElectronicItems.php');

// BUILD ORDER
$order = [
    [
		'type' => 'console',
    	'qty' => 1,
    	'extras' => [
    		['type' => 'controller', 'qty' => 2],
    		['type' => 'controller', 'qty' => 2, 'wired' => true]
    	]
    ],
    [
		'type' => 'television',
    	'qty' => 1,
    	'extras' => [
    		['type' => 'controller', 'qty' => 2]
    	]
    ],
    [
		'type' => 'television',
    	'qty' => 1,
    	'price' => 120,
    	'extras' => [
    		['type' => 'controller', 'qty' => 1]
    	]
    ],
    [
		'type' => 'microwave',
    	'qty' => 1,
    ]

];

// Process Order
$processOrder = new ElectronicItems($order);
$processedOrder = $processOrder->processOrder();
if($processedOrder['success']){
	
	$answer1 = $processOrder->getSortedItems();
	$answer2 = $processOrder->getItemsByType('console');


	// GENRATE VIEW
	echo $processOrder->generateView('Answer 1', $answer1['order'], $answer1['total']);
	echo "<hr />";
	echo $processOrder->generateView('Answer 2', [$answer2], $answer2['subtotal']);
}else{

	echo $processedOrder['message'];
}

