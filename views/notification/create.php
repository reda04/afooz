<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notification */

$this->title = 'Créer une notification push ';

?>


    

    <?= $this->render('_form', [
        'model' => $model,
        'filtres' => $filtres,
    ]) ?>


