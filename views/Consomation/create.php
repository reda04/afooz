<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consomation */

$this->title = 'Create Consomation';
$this->params['breadcrumbs'][] = ['label' => 'Consomations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consomation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
