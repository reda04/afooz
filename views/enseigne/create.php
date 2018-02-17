<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */

$this->title = 'Créer une nouvelle enseigne';
$model->Nbre_points_vente=1;

?>

<div class="enseigne-create">


    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'point' => $point,
    ]) ?>

</div>
