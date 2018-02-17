<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'newsletter_id')->textInput() ?>

    <?= $form->field($model, 'send_on')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point_de_vente_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
