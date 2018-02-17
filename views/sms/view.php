<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sms */

$this->title = $model->sms_id;
$this->params['breadcrumbs'][] = ['label' => 'Sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sms_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sms_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sms_id',
            'etat',
            'sender',
            'message',
            'send_on',
            'point_de_vente_id',
            'filtre_id',
        ],
    ]) ?>

</div>
