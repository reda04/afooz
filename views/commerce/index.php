<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type de  Commerce';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-suitcase"></i>
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
        <?= Html::a('Créer un  Type de Commerce', ['create'], ['class' => 'btn btn-primary btn-sm mr5 autoformat']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'panel panel-primary-head'],
        'columns' => [
         

            'Nom',

            ['class' => 'yii\grid\ActionColumn','header' => 'Actions','template' => '{view}{update}','headerOptions' => ['style' => 'color:#337ab7'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>