<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        $homeUrl = str_replace('/backend/web', '', yii::$app->urlManager->baseUrl);
    ?>
    <script type="text/javascript">
        function rootUrl() {
            return '<?php echo $host.$homeUrl;?>';
        }
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <section id="content">
        <h1>Login Form</h1>
        <?php echo Alert::widget() ?>
        <?php echo $content ?>
    </section>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
