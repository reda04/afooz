<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */

$this->title = 'Mise à jour d\'une enseigne ' ;

?>
<div class="enseigne-update">



    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'point' => $point,
    ]) ?>

</div>
