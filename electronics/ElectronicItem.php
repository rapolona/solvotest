<?php 

namespace Electronics;

class ElectronicItem implements Items 
{ 

	private $maxExtra = null;

	public $price = null;

	private $type = null;

	private $wired = null;

	public function maxExtras($max)
	{


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