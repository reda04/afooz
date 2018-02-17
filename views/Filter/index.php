<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Filtersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciblage des clients ';

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

<div class="filtrer-index">


<div class="contentpanel">  
     <div class="panel panel-info">
                                    <div class="panel-heading">

                                        <h3 style='color:#3A87A;'><strong>Information</strong></h3>



                                        <p style='color:black'>Les filtres que vous définissez ci-dessous vous permettent de cibler les clients lors de vos envois d'emails ou de SMS.</p>
                                      
                                    </div>
                                </div>

<p>    <a href="<?= Url::to(['filter/create'])?>" class="btn-primary btn btn-large" ><i class="glyphicon glyphicon-plus"></i> Ajouter un nouveau filtre</a></p>

    </p>


<?php Pjax::begin();



 ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,

         'options' => ['class' => 'panel panel-primary-head'],
    
 
        'hover' => true,   
        'bootstrap'=>true,

        'bordered'=>false,
         'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => '-',
    ],
        'columns' => [
            ['attribute' => 'name',
            'vAlign'=>'middle',
               'hAlign'=>'center',
            
            'format' => 'html',
              'value' => function($model) {

$name= str_replace('_'.Yii::$app->user->identity->enseigneEnseigne->name.'/'.Yii::$app->user->identity->enseigneEnseigne->enseigne_id,'',$model->name);
                 return $name;

              }],
            
            ['attribute' => 'nombre',
            'vAlign'=>'middle',
               'hAlign'=>'center',
            'label'=> '    Nombre de clients sélectionnés',
            'format' => 'html',
              'value' => function($model) {

                if( $model->statut == 'Active' )
                {
                           
                        $connection = Yii::$app->getDb();
                     $command = $connection->createCommand('SELECT COUNT(DISTINCT `last_name` )  '.$model->requete);
                     $nombre = $command->queryScalar();
                 

                 }
                 else
                 {
                    $nombre=  Html::a('Activer', ['activate','id'=>$model->filter_id], ['target'=>'_blank','class' => 'linksWithTarget btn btn-success']);
                }
                 return $nombre;

              }],

            ['class' => 'yii\grid\ActionColumn'




            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
