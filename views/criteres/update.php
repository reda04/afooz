<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Criteres */

$this->title = 'Modifiez le critère ' ;
?>
<div class="criteres-update">


    <?= $this->render('_form', [
        'model' => $model,
        'operateur' => $operateur
    ]) ?>

</div>
