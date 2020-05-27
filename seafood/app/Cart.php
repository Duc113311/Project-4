<?php 

namespace App;

class Cart{
    public $categorys=null;
    public $totailPrice=0;
    public $TotailQuanty=0;//Tổng số lượng

    //Hàm dựng
    public function __construct($cart){
        if($cart){
            $this->categorys=$cart->categorys; 
            $this->totailPrice=$cart->totailPrice;
            $this->TotailQuanty=$cart->TotailQuanty;
        }
    }
    public function AddCart($category,$id){
      $newCategory=['quanty'=> 0,'price'=>$category->price,'categoryInfo'=>$category];
      if($this->categorys){
          if(array_key_exists($id, $this->categorys)){
              $newCategory= $this->categorys[$id]; 
          }
        }
        $newCategory['quanty']++;
        $newCategory['price'] = $newCategory['quanty'] * $category->price;
        $this->categorys[$id]=$newCategory;
        $this->totailPrice+= $category->price;
        $this->TotailQuanty++;
    }
    
    public function DeleteCart($id){
       
            $this->TotailQuanty-= $this->categorys[$id]['quanty'];// cập nhật lại số lượng truyền id vồ
            $this->totailPrice-=$this->categorys[$id]['price'];
            unset($this->categorys[$id]);
    }

   public function UpdateItemCart($id, $quanty)
    {
        $this->TotailQuanty-=$this->categorys[$id]['quanty'];
        $this->totailPrice-=$this->categorys[$id]['price'];

        $this->categorys[$id]['quanty']=$quanty;
        $this->categorys[$id]['price']=$quanty * $this->categorys[$id]['categoryInfo']->price;

        $this->TotailQuanty+=$this->categorys[$id]['quanty'];
        $this->totailPrice+=$this->categorys[$id]['price'];

    }
}

?>