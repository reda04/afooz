<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Usersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion des utilisateurs';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-users"></i>
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

<p> <?= Html::a('Créer un utilisateur', ['create'], ['class' => 'btn btn-primary btn-sm mr5 autoformat']) ?></p>
        
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      
        'options' => ['class' => 'panel panel-primary-head'],  
        'columns' => [
           
             [
       // this line is optional
                 'attribute' => 'last_name',
                 'format' => 'text',
              
            ],
             [
       // this line is optional
                 'attribute' => 'first_name',
                 'format' => 'text',
              
            ],
             [
       // this line is optional
                 'attribute' => 'username',
                 'format' => 'text',
                
            ],
             [
       // this line is optional
                 'attribute' => 'status',
                 'format' => 'text',
                
            ],
             [
                'attribute' =>'role_id',
                'value' =>'role.name',
               
             ],
             

       
            
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'status',
             //  'created_at',
            // 'password',
            //'updated_at',
             

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
  
