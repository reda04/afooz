<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EnseigneHasCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enseigne Has Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enseigne-has-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enseigne Has Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enseigne_id',
            'enseigne_has_customer_id',
            'customer_id',
            'created_at',
            'number_points_sum',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
