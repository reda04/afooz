<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Consomationsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consomations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consomation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Consomation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enseigne_has_customer_id',
            'enseigne_id',
            'point_de_vente_id',
            'date_conso',
            'type_operation',
            // 'points',
            // 'offer_id',
            // 'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
