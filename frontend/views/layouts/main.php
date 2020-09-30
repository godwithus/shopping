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
    <?php $this->registerCsrfMetaTags() ?>
    <title>Yii2 E-commerce Platform</title>
    <?php $this->head() ?>
</head>
<body style="background-color: #ffffff;">
<?php $this->beginBody() ?>

<div class="wrap" style="padding-bottom: 0px;">

        <!-- The Included Header Begining -->
        <?= $this->render('header') ?>
        

        <div class="container">
            
            <?= Alert::widget() ?>
            <?= $content ?>

        </div>
            
        <!-- The Included Footer Begining -->
        <?= $this->render('footer') ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
