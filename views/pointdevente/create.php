<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pointdevente */

$this->title = 'Créer un nouveau Point de vente';
?>
<div class="pointdevente-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
