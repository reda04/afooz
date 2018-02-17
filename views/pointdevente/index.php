<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\Pointdevente;
use kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* index */
$this->title = 'Point de ventes';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-bank"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
            
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->



<div class="contentpanel">  

<p> 
        <?php

if(\Yii::$app->user->identity->enseigneEnseigne->Nbre_points_vente   > Pointdevente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->count() and \Yii::$app->user->identity->role->role=='admin')
        {
     
        echo  Html::a('Créer un  Nouveau point de vente ', ['create'], ['class' => 'btn btn-primary btn-sm mr5 autoformat']) ;
        }
         ?>
    </p>
<?php Pjax::begin(); ?>     <?=  GridView::widget([
 // change the module identifier to use the respective module's settings
        'dataProvider' => $dataProvider,
      

        'showPageSummary' => false,
        'hover' => true,   
        'bootstrap'=>true,

        'bordered'=>false,
        'columns' => [
            ['attribute' => 'nom','contentOptions' => ['style' => 'width: 10%;'],],
           [ 'attribute' => 'adresse','contentOptions' => ['style' => 'width: 30%;'],],
             ['attribute' => 'lattitude','contentOptions' => ['style' => 'width: 10%;'],],
           [ 'attribute' => 'longitude','contentOptions' => ['style' => 'width: 10%;'],],

            
     

         [     'attribute' => 'Tabelette',
               
                'enableSorting' => false,
            
                'format' => 'html',
            
                 'value' => function($model) {
                $s=  Html::a("<i class=\"fa fa-user \"></i> ".Yii::t('app', ' {modelClass}', [
                          'modelClass' => 'Connexion',
                          ]), ['tabelette/connexion','id'=>$model->point_de_vente_id], ['class' => 'btn  btn-success']);;
                
                return $s; 
        }
               
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
 <div class="row">
                                    <div class="col-md-12">
                                
                                        <div id="mapmap" class="height300"></div>
     
     <script async defer
    src="http://maps.google.com/maps/api/js?key=AIzaSyBlO6C-fB3A-7j7a9IrluwAIgR4CBT7bzw&callback=initMap">
    </script> 
    <?php
    $s='                          
    <script>
      function initMap() {
        var uluru = {lat: 33.587581, lng: -7.640484};
      
       
        var map = new google.maps.Map(document.getElementById("mapmap"), {
          zoom: 10,
          center: uluru
         
        });
     ';
echo $s;
$i=0;
     foreach($dataProvider->getmodels() as $x)
     {
      echo 'var  latlong_'.$i.'= new google.maps.LatLng('.$x['lattitude'].','.$x['longitude'].');   var  marker_'.$i.'= new google.maps.Marker({ position: latlong_'.$i.' , title:"'.$x['nom'].'" }); marker_'.$i.'.setMap(map);';
      
      $i++;

     }
     echo'

      }
    </script>';


    ?>
     </div>
        
</div>
   
