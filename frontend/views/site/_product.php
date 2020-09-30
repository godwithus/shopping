<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="<?= Url::to('@web/images/products/' . $model->image) ?>" alt="" />
                <h2>$<?= $model->amount ?></h2>
                <p><a href="<?= Url::to(['site/view', 'id' => $model->id]) ?>"><?= $model->name ?></a></p>

                <form action="<?= Url::to(['/site/cart']) ?>" method="post">
                    <input type="hidden" value="<?= $model->id ?>" name="pid">
                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </form>

            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>$<?= $model->amount ?></h2>
                    <p><a href="<?= Url::to(['site/view', 'id' => $model->id]) ?>" style="color: #ffffff;">
                            View
                    </a></p>

                    <form action="<?= Url::to(['/site/addcart']) ?>" method="post">
                        <input type="hidden" value="<?= $model->id ?>" name="pid">
                        <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul> <br>

            <?php $form = ActiveForm::begin(['action' => Url::to(['/wishlist/add-to-wishlist']), 'class' => 'nav nav-pills nav-justified']); ?>
                <input type="hidden" value="<?= $model->category_id ?>" name="category_id">
                <input type="hidden" value="<?= Yii::$app->user->id; ?>" name="user_id">
            <div class="form-group">
                <?= Html::submitButton('Add to wishlist', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            </ul>
        </div>
    </div>
</div>