<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Newslettersearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'newsletter_id') ?>

    <?= $form->field($model, 'send_on') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'point_de_vente_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
