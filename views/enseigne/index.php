<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\TypeCommerce;
use kartik\grid\DataColumn;
use kartik\widgets\Growl;
use yii\helpers\Url;
use app\models\User;
use yii\helpers\Arrayhelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Enseignesearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Gestion des enseignes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enseigne-index">

   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-sitemap"></i>
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


<?php Pjax::begin(); ?>  
<?= Html::a('<i class="glyphicon glyphicon-plus"></i> Ajouter une enseigne ', ['create'], ['class' => 'btn btn-success'])?>
<?php 

    if (Yii::$app->session->hasFlash('success'))
{
  
              echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Elément enregistré ',
    'icon' => 'fa  fa-check-circle',
    'body' => 'Les mofications apportés ont été enregistrées ',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);}
// shows how you can add in your own tags e.g. {custom}
$layout = <<< HTML
<div class="col-md-12">{summary}</div>
<div class="col-md-12" style="text-align: right;">{toolbar}</div>
<div class="clearfix"></div>
{custom}
<div class="clearfix"></div>
{items}
<div class="clearfix"></div>


<div class="col-md-6 text-align: right;">{pager}</div>
HTML;


    echo GridView::widget([
 // change the module identifier to use the respective module's settings
        'dataProvider' => $dataProvider,
      
        'options' => ['class' => 'panel panel-dark-head'],
       
        'hover' => true,   
        'bootstrap'=>true,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
         'headerRowOptions' => ['class' => 'kartik-sheet-style'],
          
          'pjax' => true, // pjax is set to always true for this demo

        'bordered'=>false,
        'columns' => [
          
           [

                'attribute' => 'users.username',
                'label' => 'Identifiant',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'enableSorting' => true,
                'contentOptions' => ['style' => 'width: 15%;'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'value' => function($model) {

              
        
                return ucfirst($model->adminenseigne['username']); 
        }
       
        ]
        ,

    
         [
                'attribute' => 'Nom',
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 15%;'],
                'headerOptions' => ['style' => 'color:#337ab7'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'value' => function($model) {

              
                $nom = ucfirst($model->adminenseigne['last_name']).' '.ucfirst($model->adminenseigne['first_name']);
                return $nom; 
        }
        ],
         [
                'attribute' => 'Email',
                'enableSorting' => true,
                'headerOptions' => ['style' => 'color:#337ab7'],
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'value' => function($model) {

              
               return ucfirst($model->adminenseigne['email']);
           
        }
        ],
           
           
           
            [ 
                'attribute' => 'name',
                'label' => 'Enseigne',
                'enableSorting' => true,
                'headerOptions' => ['style' => 'color:#337ab7'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'filterInputOptions' => ['placeholder' => 'Recherche par Enseigne,Email ou Télephone'],
  



                'value' => function($model) {
                    $enseigne = '<a href="'.Url::to(["enseigne/changesession"]).'?id='.$model->adminenseigne['id'].'  "><li style="color: #428bca;list-style: none;"  ><span class="fa  fa-caret-right" style="padding-right: 5px;font-size: 15px;"></span>'.ucfirst($model->name).'</li></a>';
                   
                    if($model->publication=='non')
                    { $enseigne .= '<ul><span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>Non publiée  ';}
                else
                {
                        $enseigne .='<br/><span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>Publiée ';
                }
                 if($model->adminenseigne['status']==0)
                    { $enseigne .= '<br/><span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>désactivée  ';}
                else
                {
                        $enseigne .='<br/><span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>activée';
                }
                  if($model->phone_number)
               {
               $enseigne .='<br/><span class="fa fa-phone" style="color: #428bca;padding-right: 5px;font-size: 15px;"></span>'.$model->phone_number;
             }
               if($model->contact_email)
               {
               $enseigne .='<br/><span class="fa fa-envelope-o" style="color: #428bca;padding-right: 5px;font-size: 15px;"></span>'.$model->contact_email;
               }
               if($model->website)
               {
               $enseigne .='<br/><span class="fa fa-globe" style="color: #428bca;padding-right: 5px;font-size: 15px;"></span>'.$model->website;
             }
                
                return $enseigne; 
        }
        ],
          
            
            
            [
               'label' => 'Actions',
               'headerOptions' => ['style' => 'color:#337ab7'],
               'format' => 'html',
               'vAlign'=>'middle',
               'hAlign'=>'center',
               'contentOptions' => ['style' => 'width: 20%;'],
               'value' => function ($model) {

 $action= Html::a('', ['update','id'=>$model->enseigne_id], ['target'=>'_blank','class' => 'linksWithTarget fa fa-pencil','style'=>'color: #428bca;font-size: 18px;']);

 /*if($model->adminenseigne->status=1)
 {
 $action .= Html::a('', ['update','id'=>$model->enseigne_id], ['target'=>'_blank','class' => 'linksWithTarget fa fa-pencil','style'=>'color: #428bca;font-size: 18px;']);
 }
 else
 {
     $action .= Html::a('', ['update','id'=>$model->enseigne_id], ['target'=>'_blank','class' => 'linksWithTarget fa fa-pencil','style'=>'color: #428bca;font-size: 18px;']);

 }*/
                return $action;
                   
                }, 



            ],
               


                ],
                'persistResize' => false,

             'layout' => $layout,
                'replaceTags' => [
                    '{custom}' => function($widget) {
                        // you could call other widgets/custom code here
                        if ($widget->panel === false) {
                            return '';
                        } else {
                            return '';
                        }
                    }
                ],

            ]);
            ?> 

</div>
<style type="text/css">
    tr.kv-page-summary.warning >td {
        background: #fff !important;
        font-size: 18px;
    }
</style>






<?php Pjax::end(); ?></div>

