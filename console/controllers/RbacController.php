<?php 
namespace console\controllers;

/**
* 
*/
use yii;
use yii\console\Controller;

class RbacController extends Controller
{
	
	public function actionInit()
	{
		$auth = yii::$app->authManager;

		/*
		* Permission Book
		*/
		// Them perminssion  createPermission()
		$createBook = $auth->createPermission('create-book');
		$createBook->description = 'Create a book';
		$auth->add($createBook);
	
		// Phan quyen xem danh sach quyen sach
		$indexBook = $auth->createPermission('index-book');
		$indexBook->description = 'View list book';
		$auth->add($indexBook);

		// Phan quyen nguoi dung cap nhat sach
		$updateBook = $auth->createPermission('update-book');
		$updateBook->description = 'update a book';
		$auth->add($updateBook);

		// Phan quyen xem mot quyen sach cu the
		$viewBook = $auth->createPermission('view-book');
		$viewBook->description = 'View a book';
		$auth->add($viewBook);

		// Phan quyen nguoi dung khi xoa mot quyen sach
		$deleteBook = $auth->createPermission('delete-boook');
		$deleteBook->description = 'Delete a book';
		$auth->add($deleteBook);

		/*
			end
		*/

		// Them nhom quyen
		$bookManager = $auth->createRole('manager-book');
		$auth->add($bookManager);
		$admin = $auth->createRole('Admin');
		$auth->add($admin);
		
		// Gan quyen cho nhom quyen
		$auth->addChild($bookManager, $createBook);
		$auth->addChild($bookManager, $updateBook);
		$auth->addChild($bookManager, $indexBook);
		$auth->addChild($bookManager, $viewBook);
		$auth->addChild($bookManager, $deleteBook);
		$auth->addChild($admin, $bookManager);

		// Gan quyen cho nguoi  dung
		$auth->assign($bookManager, 2);
		$auth->assign($admin, 1);
	}
}
?>