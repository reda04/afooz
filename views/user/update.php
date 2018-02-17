<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Modification de l\' utilisateur ' ;

?>
<div class="user-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
