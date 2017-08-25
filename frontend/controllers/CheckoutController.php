<?php 
namespace frontend\controllers;

use yii\web\Controller;
use frontend\components\cart;
use frontend\models\Checkout;
use backend\models\Order;
use backend\models\OrderItem;
use backend\models\Customer;
use yii;
/**
* 
*/
class CheckoutController extends Controller
{
	
	public function actionIndex()
	{
		$model = new Checkout();
		$cart = new Cart();
		$cartStore = $cart->cartStore;

		$cost = $cart->getCost;

		if ($model->load(yii::$app->request->post())) {
			$cus = $model->customer();
			
			if ($cus != null) {
				
				$order = $model->order($cus->id);
				if ($order != null) {
					$model->orderItem($order->id);
				}else{
					echo "Loi order <br>";
					print_r($cus->getErrors());
				}

			}else{
				echo "Loi customer <br>";
				print_r($cus->getErrors());
			}
		}

		return $this->render('index', [
			'model' => $model,
			'cartStore' => $cartStore,
			'cost' => $cost
		]);

	}

}
?>