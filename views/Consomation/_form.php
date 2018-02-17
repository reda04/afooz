<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consomation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consomation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enseigne_has_customer_id')->textInput() ?>

    <?= $form->field($model, 'enseigne_id')->textInput() ?>

    <?= $form->field($model, 'point_de_vente_id')->textInput() ?>

    <?= $form->field($model, 'date_conso')->textInput() ?>

    <?= $form->field($model, 'type_operation')->dropDownList([ 'credit' => 'Credit', 'debit' => 'Debit', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'offer_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
