<?php

namespace App;



class Cart
{
    public $products = null;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->products = $oldCart->products;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }

    }

    public function add($dish, $id)
    {
        $storeItem =['qty'=>0, 'price'=>$dish->price, 'item'=>$dish];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $storeItem = $this->products[$dish->id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price']= $storeItem['qty']* $dish->price;
        $this->products[$dish->id] = $storeItem;
        $this->totalQty ++;
        $this->totalPrice += $dish->price;

    }
    public function deleteByOne($id)
    {
        $this->products[$id]['qty']--;
        $this->products[$id]['price']-= $this->products[$id]['item']['price'];
        $this->totalQty --;
        $this->totalPrice -= $this->products[$id]['item']['price'];

        if($this->products[$id]['qty']<=0){
            unset($this->products[$id]);
        }
    }
    public function deleteByItem($id)
    {
        $this->totalQty -= $this->products[$id]['qty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

}
