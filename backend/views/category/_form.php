<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

	<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            
		    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
		    <?php
		    	$cat = new Category;
		    ?>
		    <?= $form->field($model, 'parent')->dropDownList(
		    	$cat->getParent(),
		    	[
		    		'prompt'=>'Danh muc cha'
		    	]
		    ) ?>

		    <?= $form->field($model, 'status')->dropDownList(
		    	[
		    		1=>'Active',
		    		0=>'Deactive'
		    	],[
		    		'prompt'=>'Chon trang thai'
		    	]
		    ) ?>

		    <div class="form-group">
		        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>
        </div>
    </div>
    

</div>
