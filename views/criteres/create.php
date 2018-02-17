<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Criteres */

$this->title = 'Créer un critère';

?>
<div class="criteres-create">

  

    <?= $this->render('_form', [
        'model' => $model,
        'operateur'=> $operateur,
    ]) ?>

</div>
