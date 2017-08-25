<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        $cat = new Category;
    ?>
    <?= $form->field($model, 'cate')->dropDownList(
        $cat->getParent(),
        [
            'prompt'=>'Danh muc cha'
        ]
    ) ?>
    
    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'image')->hiddenInput(['id' => 'image']) ?>
            <img src="<?php echo $model->image; ?>" id="show-image">
            <br/>
            <div style="margin-top: 5px;">
                <a href="#" id="select-img" title="Chọn hình ảnh" class="btn btn-info btn-sm">Chọn ảnh</a>
                <a href="#" id="remove-img" title="Chọn hình ảnh" class="btn btn-danger btn-sm">Xóa ảnh</a>
            </div>
            
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

    <?= $form->field($model, 'desc')->textarea(['id' => 'desc']) ?>

    <?= $form->field($model, 'content')->textarea(['id' => 'content']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pages')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'publish_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
