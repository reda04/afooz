<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notificationsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'notification_id') ?>

    <?= $form->field($model, 'send_on') ?>

    <?= $form->field($model, 'valid_to') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'contents') ?>

    <?php // echo $form->field($model, 'enseigne_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
