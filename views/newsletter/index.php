<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Newslettersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';

?>

 <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-envelope-o"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Campagnes marketing </li>
                <li>E-mails</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4>Toutes les <?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="contentpanel">

<div class="criteres-form">
    <div class="contentpanel">  
              <div class="col-md-12">
    <p>
        <?= Html::a('Envoyer un e-mail', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>



   <div class="panel panel-info">
                                    <div class="panel-heading">

                                        <h3 style='color:#3A87A;'><strong>Info</strong></h3>



                                        <p style='color:black'>Vous n'avez pas encore créé de newsletters. Cliquez sur le bouton ci-dessus pour envoyer un e-mail à vos clients.</p>

                                      
                                    </div>

                                </div>
                                <?php 
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
        'showPageSummary' => true,
        'hover' => true,   
        'bootstrap'=>true,

        'bordered'=>false,
        'columns' => [
          
               'title',
               
               
                
         'send_on',
            
          
         [     'attribute' => 'etat',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {

               $s ='<span class="label label-default">'.$model->etat.'</span>';
                
                return $s; 
        }
               
        ],

         [     'attribute' => 'E-mails Affectes',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {
$connection = Yii::$app->getDb();
               
$s ='';
                 if($model->filter['requete'] != null)
                 {
                // $command1 =$connection->createCommand('select email '.$model->filter['requete']);   
                 $command2 = $connection->createCommand('select count(*) '.$model->filter['requete']);
               
                }
                else
                    { // $command1 =$connection->createCommand('select email from  `customer`  INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id  AND enseigne_has_customer.enseigne_id='.Yii::$app->user->identity->enseigneEnseigne->enseigne_id) ;   
                     $command2 = $connection->createCommand('select count(*) from  `customer`  INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id AND enseigne_has_customer.enseigne_id='.Yii::$app->user->identity->enseigneEnseigne->enseigne_id);

                    }
                   
                      $nombre = $command2->queryScalar();
                    
                     
               $s .=' <h3>   '.$nombre.' </span></h3>';

                return $s; 
        }
               
        ],

         [  'attribute' => 'E-mails Delivres',   
            'enableSorting' => false,
            'contentOptions' => ['style' => 'width: 20%;'],
            'format' => 'html',
            'vAlign'=>'middle',
            'value' => function($model) {
    
            $s ='<h3 style="color:red">0</h3>';    
        
                return $s; 
        }
               
        ],

         [     'attribute' => 'E-mails Ouverts',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {

               $s ='<h3 style="color:red">0</h3>'; 
                
                return $s; 
        }
               
        ],
        

                ],

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
</div>
