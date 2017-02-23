<?php

namespace App;

class cart
{
    public $items = null;
    public $totalqty = 0;
    public $totalprice = 0;

    public function __construct($oldcart)
    {
    	if($oldcart)
    	{
    		$this->items = $oldcart->items;
    		$this->totalqty = $oldcart->totalqty;
    		$this->totalprice = $oldcart->totalprice;
    	}
    }

    public function add($item,$id)
    {
    	$storeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    	if($this->items)
    	{
    		if(array_key_exists($id, $this->items))
    		{
    			$storeditem = $this->items[$id];
    		}
    	}
    	$storeditem['qty']++;
    	$storeditem['price'] = $item->price * $storeditem['qty'];
    	$this->items[$id] = $storeditem;
    	$this->totalqty++;
    	$this->totalprice += $item->price;
    }

    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalqty--;
        $this->totalprice -=  $this->items[$id]['item']['price'];

        if ($this->items[$id]['qty'] <=0 )
        {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {
        $this->totalqty -= $this->items[$id]['item']['qty'];
        $this->totalprice -=  $this->items[$id]['price'];

        unset($this->items[$id]);
    }
}
