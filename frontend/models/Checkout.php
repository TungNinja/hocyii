<?php 
namespace frontend\models;

use Yii;
use yii\base\Model;
use backend\models\Order;
use backend\models\OrderItem;
use backend\models\Customer;
use frontend\components\cart;
/**
* 
*/
class Checkout extends Model
{
	public $full_name;
	public $email;
	public $address;
	public $phone;
	public $order_note;
	public $shipping_method;
	public $payment_method;
	public $amount;
	public function rules()
	{
		return [
    [['full_name', 'email', 'phone'], 'required', 'message' => '{attribute} không được để trống'],
    [['full_name', 'email', 'order_note', 'shipping_method', 'payment_method', 'address'], 'string'],
    [['phone', 'amount'], 'integer'],
    [['email'], 'email']
        ];
	}
	
	public function attributeLabels()
	{
		return[
			'full_name' => ' Họ và tên',
			'email' => 'Địa chỉ email',
			'address' => 'Địa chỉ',
			'phone' => 'Số điện thoại',
			'order_note' => 'Ghi chú đơn hàng',
			'shipping_method' => 'Phương thưc vận chuyển',
			'payment_method' => 'Phương thức thanh toán'
		];
	}

	public function customer()
	{
		if (!$this->validate()) {
			return null;
		}

		$cus = new Customer();
		
		$cus->full_name = $this->full_name;
		$cus->email = $this->email;
		$cus->phone = $this->phone;
		$cus->address = $this->address;
		$cus->status = 1;
		$cus->created_at = time();
		$cus->updated_at = time();
		$cus->username = 'username';
		$cus->password_hash = 'auth_key';
		$cus->password_reset_token = 'password_reset_token';
		$cus->auth_key = 'auth_key';

		return $cus->save() ? $cus : null;
	}

	public function order($customer_id)
	{
		if (!$this->validate()) {
			return null;
		}

		$order = new Order();
		$order->customer_id = $customer_id;
		$order->amount = $this->amount;
		$order->order_note = 'abc';
		$order->shipping_method = $this->shipping_method;
		$order->payment_method = $this->payment_method;
		$order->created_at = time();
		$order->updated_at = time();

		return $order->save() ? $order : null;
	}

	public function orderItem($orderId)
	{
		$flag = false;

		$cart = new Cart();
		$cartStore = $cart->cartStore;
		$cost = $cart->getCost;

		if (!$this->validate()) {
			return null;
		}

		foreach ($cartStore as $item) {
			$orderIt = new OrderItem();
			$orderIt->order_id = $orderId;
			$orderIt->product_id = $item->id;
			$orderIt->price = $item->price;
			$orderIt->quantity = $item->qtt;
			$orderIt->return_status = 0;

			if ($orderIt->save()) {
				$flag = true;
			}
		}

		return $flag;
	}
}
?>