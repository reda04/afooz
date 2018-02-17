<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Filtersearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'filter_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'statut') ?>

    <?= $form->field($model, 'operation') ?>

    <?= $form->field($model, 'requete') ?>

    <?php // echo $form->field($model, 'point_de_vente_id') ?>

    <?php // echo $form->field($model, 'enseigne_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
