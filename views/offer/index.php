<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offres de fidélité';

//enseigneEnseigne

 
// Multilanguage widgets with AJAX UPLOAD
?>

   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa  fa-file-photo-o"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Réglages </li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->



<div class="contentpanel">

<div class="criteres-form">
    <div class="contentpanel">  

                           <h4 class="panel-title">Merci de remplir le formulaire ci-dessous</h4>
                           
                   

                     
                        <div class="callout callout-info">
                          <div class="alert alert-info fade in nomargin">
  <h4><strong>Information</strong></h4>
  <p style='color:black;'>Par défaut, 1 passage = 1 point. Vous pouvez modifier cette règle dans la section "Options de fidélisation".</p>
</div>
</div>
<p> <p> <a href="<?= Url::to(['offer/create'])  ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Ajouter une offre</a>

    </p>
</p> 
<?= GridView::widget([
        'dataProvider' => $dataProvider,
                'options' => ['class' => 'panel panel-primary-head'],
        'columns' => [


      
            'title',
            'points',
            'value',
     

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



