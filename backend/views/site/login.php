<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'id'=>'username', 'placeholder'=>'Username'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['id'=>'password', 'placeholder'=>'Username'])->label(false) ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div>
        <input type="submit" value="Log in" />
        <a href="#">Lost your password?</a>
        <a href="#">Register</a>
    </div>

<?php ActiveForm::end(); ?>
       
