<?php 

namespace Electronics;

class ElectronicItem implements Items 
{ 

	private $maxExtra = null;

	public $price = null;

	private $type = null;

	private $wired = null;

	private $extras = [];

	const ELECTRONIC_ITEM_CONSOLE = "console"; 
	const ELECTRONIC_ITEM_MICROWAVE = "microwave";
    const ELECTRONIC_ITEM_TELEVISION = "televison"; 
	const ELECTRONIC_ITEM_CONTROLLER = "controller";

	const MSG_EXTRAS_NOT_ALLOWED = "Extra is not allowed to this item";

	private static $types = array(
		self::ELECTRONIC_ITEM_CONSOLE, 
		self::ELECTRONIC_ITEM_MICROWAVE, 
		self::ELECTRONIC_ITEM_TELEVISION,
		self::ELECTRONIC_ITEM_CONTROLLER
	); 


	public function processElectornicItem()
	{
		$extras = $this->processExtas();
		return ['extras' => $extras, 'type' => $this->type ];
	}

    public function processExtas()
    {
    	
    	return ['total' => 0];
    }
 
	public function maxExtras()
	{
		$grant = $this->getExtraGrant();
		if($grant){
			$maxExtras = $this->getMaxExra();

			if($this->maxExtra > 0 && $this->maxExtra > count($this->extras)){
				return ['message' => "You can't add more than {$this->maxExtra} to this item!", 'success' => false];
			}

		}
		return ['message' => self::MSG_EXTRAS_NOT_ALLOWED, 'success' => false];
	}

	public function getExtraGrant()
	{
	    if($this->maxExtra==null){
	    	return false;
	    }	
	    return true;
	}

	public function getMaxExra()
	{
		return $this->maxExtra;
	}

	public function setMaxExtra($maxExtra)
	{
		$this->maxExtra = $maxExtra;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

    public function getType()
    {
    	return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getWired()
    {
        return $this->wired;
    }

    public function setWired($wired)
    {
        $this->wired = $wired;
    }


}