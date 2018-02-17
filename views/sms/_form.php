<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sms_id')->textInput() ?>

    <?= $form->field($model, 'etat')->dropDownList([ 'brouillon' => 'Brouillon', 'envoyé' => 'Envoyé', 'en attente' => 'En attente', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'send_on')->textInput() ?>

    <?= $form->field($model, 'point_de_vente_id')->textInput() ?>

    <?= $form->field($model, 'filtre_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
