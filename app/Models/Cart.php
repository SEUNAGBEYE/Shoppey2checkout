<?php

namespace App\Models;


class Cart
{
    public $itemsName = null;
    public $itemsQuantity= 0;
    public $totalPrice= 0;
    // public $itemPrice=null;

    public function __construct($oldCart)
    {
    	if ($oldCart)
    	{
    		$this->itemsName = $oldCart->itemsName;
    		$this->itemsQuantity= $oldCart->itemsQuantity;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function addItem($itemName, $id)
    {

    	$itemToAdd = ['item'=>$itemName->item, 'price'=>$itemName->price, 'quantity'=>0, 'eachprice'=>$itemName->price, 'id'=>$id];
    	if ($this->itemsName)
    	{
    		if (array_key_exists($id, $this->itemsName))
    		{
    			$itemToAdd = $this->itemsName[$id];
    		}
    	}
    	$itemToAdd['quantity']++;
    	$itemToAdd['price'] = $itemName->price*$this->itemsQuantity['quantity'];
        $itemToAdd['id'] = $id;
    	$this->itemsName[$id] = $itemToAdd;
    	$this->itemsQuantity++;
    	$this->totalPrice+= $itemName->price;

        
    }

    public function reduceByOne($product, $id){
        $this->itemsName[$id]['quantity']--;
        // dd($this->itemsName[$product->id]['eachprice']);
        $this->itemsName[$id]['eachprice']-=  $this->itemsName[$id]['eachprice'];
        // $this->itemsQuantity=$this->itemsQuantity - 1;
        $this->itemsQuantity--;
        // $this->totalPrice-=$this->itemsName[$product->id]['eachprice'];

        $this->totalPrice-=$this->itemsName[$id]['eachprice'];
        // $this->itemsName[$product->id]['quantity']-=1);

        if ($this->itemsName[$id]['quantity'] <= 0){
            unset($this->itemsName['id']);
        }
    }
}
