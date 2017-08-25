<?php
namespace backend\models;

use yii\db\ActiveRecord;

/*
* 
*/
class Contact extends ActiveRecord
{

	public static function tableName()
	{
		return '{{%contact}}';
	}

	public function rules()
	{
		$rules = [
			[['name', 'subject', 'email', 'body'], 'required'],
			['email', 'string', 'max'=>100],
			['body', 'safe'],
			['email', 'email'],
			[['created_at', 'updated_at'],'integer']
		];

		return $rules;
	}

}

?>