<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\customersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Base clients';

?>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-cloud"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Clients</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->



<div class="contentpanel">  

<p> <?= Html::a('Créer un Client', ['create'], ['class' => 'btn btn-primary btn-sm mr5 autoformat']) ?></p>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
  
            'options' => ['class' => 'panel panel-primary-head'],
        'columns' => [
        

           // 'customer_id',
            
            'email:email',
            //'address_id',
            // 'active',
            // 'create_date',
            // 'last_update',
             'gender',
             'birthday',
            // 'optin_email:email',
             'phone',
             'first_name',
            'last_name',
            // 'optin_sms',
            // 'comment',
              [
                'attribute' =>'country_id',
                'label' => ' Pays',
                'value' =>'country.nom_fr_fr',
               
             ],
             'code',
            // 'city',
            // 'adress',

           
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
