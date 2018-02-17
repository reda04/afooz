<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Modifiez  un compte utilisateur';

?>


   <?= $this->render('_form', [
        'model' => $model,
        'permission' => $permission, 'per_vente' => $per_vente
    ]) ?>

