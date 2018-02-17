<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */

$this->title = 'Créer un nouveau filtre';

?>
<div class="filtrer-create">

    <?= $this->render('_form', [
        'model' => $model,
        'pointdevente' => $pointdevente ,
        'nombre' => $nombre,
    ]) ?>

</div>
