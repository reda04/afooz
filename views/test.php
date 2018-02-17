<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperateurhasCriteres */
/* @var $form ActiveForm */
?>
<div class="test">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Operateur_Operateur_id') ?>
        <?= $form->field($model, 'Criteres_Critere_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- test -->
