<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeCommerce */

$this->title = 'Modifiez le type  de commerce: ' ;

?>
<div class="type-commerce-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
