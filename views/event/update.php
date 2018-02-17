<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Modifier l\'événement: ' ;

?>
<div class="event-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
