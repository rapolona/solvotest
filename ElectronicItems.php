<?php

use Electronics\Console;
use Electronics\Television;
use Electronics\Microwave;
use Electronics\Controller;
use Electronics\ElectronicItem;

class ElectronicItems {

	private $items = array();

	private $order = array();

	private $total = 0;
	
	public function __construct(array $items)
	{
        $this->items = $items;
	}

    /**
	* @return array
	* returns sorted item by price desc order
	* */
	public function getSortedItems()  
	{  
		usort($this->order, function($a, $b) {
    		return $a['price'] <=> $b['subtotal'];
        });
		return ['order' => $this->order, 'total' => $this->total];
	}

    /**
	* @return array
	* return build order with total value
	* */
	public function processOrder()
	{
		$total = 0;
		foreach($this->items as $item){
			$processedItem = $this->processItem($item);
			if($processedItem['extras']['success']===false){
				return $processedItem['extras'];
			}
			$item['subtotal'] = ($item['qty'] * $processedItem['price']); 
			$item['price'] = $processedItem['price'];
			if(isset($item['extras'])){
                $extraSubtotal = 0;
				foreach($item['extras'] as $extraKey => $extra){
					$processedExtras = $this->processItem($extra);
					$extraSubtotal += $extra['qty'] * $processedExtras['price'];
					$item['extras'][$extraKey]['price'] = $processedExtras['price'];
					$item['subtotal'] += $extraSubtotal;
					$this->total += $extraSubtotal;
				}
				$item['extras']['extras_subtotal'] = $extraSubtotal;
			}

			array_push($this->order, $item);
			$this->total += $item['subtotal'];
		}
    
        return ['order' => $this->order, 'total' => $this->total, 'success' => true];

	}

    /**
	* @return array
	* returns processed item 
	* */
	private function processItem($item)
	{
		$newItem = [];
		switch($item['type']){
			case 'console': 
			    $orderItem= new Console($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
			case 'television': 
			    $orderItem = new Television($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
			case 'microwave': 
			    $orderItem = new Microwave($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
			case 'controller': 
			    $orderItem = new Controller($item);
			    $newItem = $orderItem->processElectornicItem();
				break;
            default:
                return ['error' => 'item type ' . $item['type'] .' not available'];
		}
		return $newItem;
	}

    /**
	* @return array
	* returns selected type from the order
	* */
    public function getItemsByType($type)
    {    
    	if (in_array($type, ElectronicItem::$types))  {   
    		$key = array_search($type, array_column($this->order, 'type'));
    		if($key > -1){
    			return $this->order[$key];
    		}
        }
    	return ['error' => 'item type ' . $type . ' not available'];
    }

    /**
	* @return string
	* returns html view of ordered items
	* */
    public function generateView($title, $order, $total)
    {

    	$view = '
    	<table>
    		<thead>
    		    <tr>
    				<th colspan="4">' . $title . '</th>
    			<tr>
    			<tr>
    				<td>Item</td>
    				<td>Price</td>
    				<td>Qty</td>
    				<td>Subtotal</td>
    			</tr>
    		</thead>
    		<tbody>';

    		foreach($order as $item){
    			$view .= '
				<tr>
    				<td>'.$item['type'].'</td>
    				<td>'.$item['price'].'</td>
    				<td>'.$item['qty'].'</td>
    				<td>'.$item['subtotal'].'</td>
    			</tr>
    			';
    			if(isset($item['extras']) ){
    				foreach($item['extras'] as $extra){
    					if(is_array($extra)){
    			$view .= '<tr style="font-style: italic; font-size:10px">';
    				
					$view .= '<td>&nbsp;&nbsp;&nbsp;'.$extra['type'].'</td>
					<td>'.$extra['price'].'</td>
    				<td>'.$extra['qty'].'</td>
    				<td>'.$extra['qty'] * $extra['price'].'</td>
					';
}
				    
				$view .= '</tr>';
					}
    			}
    		}
    
    	$view .='</tbody>
    	<tfoot>
    		<tr>
    			<td colspan="3">Total</td>
    			<td>' .$total. '</td>
    		</tr>
    	</tfoot>
    	</table>
    	';

    	return $view;
    }

}