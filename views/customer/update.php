<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Mette à jour  le client : ' ;

?>
<div class="customer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
