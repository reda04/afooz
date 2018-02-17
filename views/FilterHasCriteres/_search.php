<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FilterHasCriteressearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filterhas-criteres-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'filter_id') ?>

    <?= $form->field($model, 'operateur_has_criteres_id') ?>

    <?= $form->field($model, 'selected_value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
