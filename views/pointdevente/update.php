<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pointdevente */

$this->title = 'Mise à jour du point de vente : ' ;

?>
<div class="pointdevente-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
