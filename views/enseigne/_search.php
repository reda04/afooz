<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enseignesearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enseigne-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

  

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'google_plus') ?>

    <?php // echo $form->field($model, 'trip_advisor') ?>

    <?php // echo $form->field($model, 'instagram') ?>

    <?php // echo $form->field($model, 'youtube') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'register_required_name') ?>

    <?php // echo $form->field($model, 'register_required_email') ?>

    <?php // echo $form->field($model, 'default_optin') ?>

    <?php // echo $form->field($model, 'pts_register') ?>

    <?php // echo $form->field($model, 'passage_or_amount') ?>

    <?php // echo $form->field($model, 'clean_points') ?>

    <?php // echo $form->field($model, 'clean_points_param') ?>

    <?php // echo $form->field($model, 'register_to_use_points') ?>

    <?php // echo $form->field($model, 'delay_before_checkin') ?>

    <?php // echo $form->field($model, 'ipad_pin') ?>

    <?php // echo $form->field($model, 'ipad_pin_reward') ?>

    <?php // echo $form->field($model, 'language_id') ?>

    <?php // echo $form->field($model, 'slide_id') ?>

    <?php // echo $form->field($model, 'setting_pts_amount_currency_id') ?>

    <?php // echo $form->field($model, 'register_required_phone') ?>
    <?php  echo $form->field($model, 'phone_nuber') ?>

    <?php // echo $form->field($model, 'Typeco_ID') ?>

    <?php // echo $form->field($model, 'Type_commerce_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
