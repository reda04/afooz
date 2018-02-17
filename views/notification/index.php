<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Notificationsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications push';

?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-phone"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Campagnes marketing </li>
               
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4> <?= Html::encode($this->title) ?> </h4>
        </div>
    </div><!-- media -->
</div>

<div class="contentpanel">



    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Notification', ['create'], ['class' => 'btn btn-primary ']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            
            'title',
            'description',
            
            'send_on',
           
           
          
            // 
            // 'contents:ntext',
            // 'enseigne_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>