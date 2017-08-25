<?php
namespace frontend\controllers;
use yii\web\Controller;
use backend\models\Book;
/**
* 
*/
class BookController extends Controller
{
	
	public function actionIndex($slug)
	{
		
	}

	public function actionView($slug)
	{
		$book = Book::findone(['slug'=>$slug]);
		
		return $this->render('view', ['book'=>$book]);
	}

	
}
?>