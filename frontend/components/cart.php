<?php 
namespace frontend\components;
use yii;
/**
* 
xu ly gio hang
Gom cac phuong thuc

*/
class cart
{
	/*
		Phuong thuc them vao gio hang gom cac phuong thuc sau
		@data = selay theo id hoac slug
		@quantity -> SO luong moi lan them vao gio hang
	*/
	/*
		Khoi tao session trong yii yii::$app-session['ten_session'] = Gia tri
		Lay gia tri cua session su dung $session = yii::$app->session['ten_session'];
	*/
	public $cartStore;
	public $getCost = 0;

	public function __construct(){

		$this->cartStore = yii::$app->session['cart'];
		$this->getCost = $this->getCost();
	}

	public  function add($data, $quantity = 1)
	{
		if (isset($this->cartStore[$data->id])) {
			$this->cartStore[$data->id]->qtt = $this->cartStore[$data->id]->qtt + 1;
			yii::$app->session['cart'] = $this->cartStore;
		}else{
			$this->cartStore[$data->id] = $data;
			$this->cartStore[$data->id]->qtt = $quantity;
			yii::$app->session['cart'] = $this->cartStore;
		}
	}

	public function remove($data)
	{
		unset($this->cartStore[$data->id]);
		yii::$app->session['cart'] = $this->cartStore;
	}
	public function update($id, $qtt)
	{
		$this->cartStore[$id]->qtt += $qtt;
		yii::$app->session['cart'] = $this->cartStore;
	}

	public function getCost()
	{
		if ($this->cartStore) {
			foreach ($this->cartStore as $item) {
				$this->getCost += $item->qtt*$item->price;
			}
		}

		return $this->getCost;
	}

	public function gettotoItem()
	{
		$total = 0;
		if ($this->cartStore) {
			foreach ($this->cartStore as $key) {
				$total += $key->qtt;
			}
		}

		return $total;
	}

	public function removeAll()
	{
		$this->cartStore = [];
		yii::$app->session['cart'] = $this->cartStore;
	}
}
 ?>