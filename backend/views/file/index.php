<?php
/* @var $this yii\web\View */
$this->title = 'Quản lý file';
$homeUrl = str_replace('/backend/web', '', yii::$app->urlManager->baseUrl);
?>

<div class="file-index">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $this->title; ?></h3>
		</div>
		<div class="panel-body">
			<iframe style="width: 100%; height: 500px; border: none;" src="<?php echo $homeUrl; ?>/file/dialog.php"></iframe>
		</div>
	</div>
</div>
