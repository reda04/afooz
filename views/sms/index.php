
<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\DataColumn;
use app\models\Pointdevente;
use app\models\sms;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Newslettersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SMS';

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
                <li>SMS</li>
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
                   <div class="panel panel-info">


              
                                    <div class='panel-heading'>

                                        <h3 style='color:#3A87A;'><strong>Respect de la législation sur les SMS commerciaux</strong></h3>



                                        <p style='color:black'>La loi française interdit l'envoi de SMS commerciaux entre 20h et 8h, ainsi que le Dimanche et les jours fériés..</p>
                                        <p style='color:black'>LSi vous planifiez l'envoi de SMS durant une de ces périodes interdites, ceux-ci seront automatiquement mis en attente jusqu'à la prochaine période autorisée.</p>

                                      
                                    </div>

                                </div>
    <p>
        <?= Html::a('Envoyer un SMS', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>


      <?php

 $point_id =pointdevente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one()['point_de_vente_id'];
$resultat = sms::find()->where(['point_de_vente_id'=>$point_id])->count();
if($resultat == 0)
{

echo "
   <div class='panel panel-info'>
                                    <div class='panel-heading'>

                                        <h3 style='color:#3A87A;'><strong>Info</strong></h3>



                                        <p style='color:black'>Vous n'avez pas encore créé de sms. Cliquez sur le bouton ci-dessus pour envoyer un sms à vos clients.</p>

                                      
                                    </div>

                                </div>";

}
else
{

Pjax::begin();
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
          
               'description',
               
               
                
         'send_on',
            'message',
          
         [     'attribute' => 'etat',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {
                        if($model->etat=='brouillon')
                        {
               $s ='<span class="label label-default">'.$model->etat.'</span>';
                }
                elseif ($model->etat=='en attente') {
                    # code...
                      $s ='<span class="label label-default"> préparation des messages</span>';
                }
                else
                {
                         $s ='<span class="label label-success">'.$model->etat.'</span>';
                }
                return $s; 
        }
               
        ],

         [     'attribute' => 'Destinataires',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {
$connection = Yii::$app->getDb();
               
$s ='';
                 if($model->filtre['requete'] != null)
                 {
                 
                 $command2 = $connection->createCommand('select count(*) '.$model->filtre->requete );
               
                }
                else
                    {  
                     $command2 = $connection->createCommand('select count(*) from  `customer`  INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id AND enseigne_has_customer.enseigne_id='.Yii::$app->user->identity->enseigneEnseigne->enseigne_id);

                    }
                 
                      $nombre = $command2->queryScalar();
                    
                     
               $s .=' <h3>    '.$nombre.' </h3>';

                return $s; 
        }
               
        ],

         [  'attribute' => 'SMS envoyés',   
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
 Pjax::end(); 
}
            ?> 

</div>
<style type="text/css">
    tr.kv-page-summary.warning >td {
        background: #fff !important;
        font-size: 18px;
    }
</div>



</div>
