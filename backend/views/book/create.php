<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
$homeUrl = str_replace('/backend/web', '', yii::$app->urlManager->baseUrl);

?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<div class="modal fade" id="modal-image-book">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thư viện hình ảnh</h4>
        </div>
        <div class="modal-body">
          <iframe src="<?php echo  $homeUrl; ?>/file/dialog.php?field_id=image" style="border: none; width: 100%; height: 500px;"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Chọn</button>
        </div>
      </div>
      
    </div>
</div>
