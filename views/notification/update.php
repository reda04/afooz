<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Notification */

$this->title = 'Update Notification: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->notification_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-update">

    <h1 style="display:none;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'filtres' => $filtres,
    ]) ?>

</div>
