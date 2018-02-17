<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consomationsearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consomation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enseigne_has_customer_id') ?>

    <?= $form->field($model, 'enseigne_id') ?>

    <?= $form->field($model, 'point_de_vente_id') ?>

    <?= $form->field($model, 'date_conso') ?>

    <?= $form->field($model, 'type_operation') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'offer_id') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
