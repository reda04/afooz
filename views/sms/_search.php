<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\smssearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sms_id') ?>

    <?= $form->field($model, 'etat') ?>

    <?= $form->field($model, 'sender') ?>

    <?= $form->field($model, 'message') ?>

    <?= $form->field($model, 'send_on') ?>

    <?php // echo $form->field($model, 'point_de_vente_id') ?>

    <?php // echo $form->field($model, 'filtre_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
