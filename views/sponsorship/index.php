<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sponsorships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sponsorship-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sponsorship', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sponsorship_id',
            'active',
            'max_referrals',
            'pts_sponsor',
            'pts_referral',
            // 'delay',
            // 'enseigne_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
