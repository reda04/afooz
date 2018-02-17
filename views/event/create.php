<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Créer un événement';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
