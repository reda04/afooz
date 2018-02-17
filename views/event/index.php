<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Eventsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion des Evénements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criteres-index">

   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Réglages Super-Admin </li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->



<div class="contentpanel">   


    <p>
        <?= Html::a('Créer un événement', ['create'], ['class' => 'btn btn-primary btn-sm mr5 autoformat']) ?>
    </p>
        
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            'event_type',
            'created_at',
          

            ['class' => 'yii\grid\ActionColumn','header'=>'Actions','headerOptions' => ['style' => 'color:#337ab7'],],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
