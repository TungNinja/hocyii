<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
</head>
<body>
<?php $this->beginBody() ?>

    <section class="hero">
        <header>
            <div class="wrapper">
                <a href="#"><img src="img/logo.png" class="logo" alt="" titl=""/></a>
                <a href="#" class="hamburger"></a>
                <nav>
                    <ul>
                        <li><a href="#">Buy</a></li>
                        <li><a href="#">Rent</a></li>
                        <li><a href="#">Sell</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <?php if(!Yii::$app->user->isGuest) : ?>
                        <em><?php echo Yii::$app->user->identity->username; ?></em>
                    
                        <a href="#" class="login_btn">Login</a>
                    <?php endif ?>
                </nav>
            </div>
        </header><!--  end header section  -->

            <section class="caption">
                <h2 class="caption">Find You Dream Home</h2>
                <h3 class="properties">Appartements - Houses - Mansions</h3>
            </section>
    </section><!--  end hero section  -->
    <div style="clear: both;"></div>

    <?php echo $content; ?>
    <div style="clear: both;"></div>
    <footer>
        <div class="wrapper footer">
            <ul>
                <li class="links">
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>

                <li class="links">
                    <ul>
                        <li><a href="#">Appartements</a></li>
                        <li><a href="#">Houses</a></li>
                        <li><a href="#">Villas</a></li>
                        <li><a href="#">Mansions</a></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>

                <li class="links">
                    <ul>
                        <li><a href="#">New York</a></li>
                        <li><a href="#">Los Anglos</a></li>
                        <li><a href="#">Miami</a></li>
                        <li><a href="#">Washington</a></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>

                <li class="about">
                    <p>La Casa is real estate minimal html5 website template, designed and coded by pixelhint, tellus varius, dictum erat vel, maximus tellus. Sed vitae auctor ipsum</p>
                    <ul>
                        <li><a href="http://facebook.com/pixelhint" class="facebook" target="_blank"></a></li>
                        <li><a href="http://twitter.com/pixelhint" class="twitter" target="_blank"></a></li>
                        <li><a href="http://plus.google.com/+Pixelhint" class="google" target="_blank"></a></li>
                        <li><a href="#" class="skype"></a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="copyrights wrapper">
            Copyright © 2015 <a href="http://pixelhint.com" target="_blank" class="ph_link" title="Download more free Templates">Pixelhint.com</a>. All Rights Reserved.
        </div>
    </footer><!--  end footer  -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
