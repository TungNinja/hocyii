<?php 
namespace frontend\controllers;
use yii\web\Controller;
use backend\models\Book;
use frontend\components\cart;
use yii;
/**
* 
*/
class CartController extends Controller
{
	
	public function actionIndex()
	{
		$cart = new cart();
		$cartStore = $cart->cartStore;
		$cost = $cart->getCost;
		$total = $cart->gettotoItem();

		return $this->render('index', [
			'cartStore'=>$cartStore,
			'cost' => $cost,
			'total' => $total
		]);
	}

	public function actionAddCart($slug)
	{
		$cart = new cart();
		$model = Book::findone(['slug'=>$slug]);

		if ($model->quantity > 0) {
			$cart->add($model);
			return "ok";
		}else{
			return "die";
		}
		
		//return $this->redirect(['/cart']);
	}

	public function actionRemove($slug)
	{
		$cart = new cart();
		$model = Book::findone(['slug'=>$slug]);

		$cart->remove($model);
		return $this->redirect(['/cart']);
	}

	public function actionUpdateCart()
	{
		$cart = new Cart();
		if (yii::$app->request->post()) {
			$id =  $_POST['id'];
			$qtt =  $_POST['qtt'];
			$cart->update($id, $qtt);
		}
		
		return $this->redirect(['/cart']);
	}

	public function actionClear()
	{
		$cart = new Cart();
		$cart->removeAll();
		return $this->redirect(['/cart']);
	}
	
}
?>