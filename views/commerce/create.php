<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeCommerce */

$this->title = 'Créer un Type de commerce';

?>
<div class="type-commerce-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
