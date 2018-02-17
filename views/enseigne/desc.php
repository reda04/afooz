<?php

use yii\helpers\Html;
use yii\grid\GridView;


use yii\helpers\Url;
use kartik\form\ActiveForm;

use app\models\User;



/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */


$this->title = 'Description de l\'enseigne';

//enseigneEnseigne
?>
<?php $form = ActiveForm::begin(); ?>


   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-sliders"></i>
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
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                          <div class="panel-btns" style="display: none;">
                              <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                              <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                          </div><!-- panel-btns -->
                           <h4 class="panel-title">Description de l'enseigne</h4>
                           <p>Merci de remplir le formulaire ci-dessous</p>
                      </div>
                      <div class="panel-body">
                          <div class="row"> 
                            <div class="col-sm-6">
                              
    <div class="form-group">
    <?= $form->field($model, 'average_purchase_value', [
    'addon' => [ 
        'prepend' => ['content' => '<i class=" fa fa-shopping-cart" color:"blue"></i>'],
        'append' => ['content' => 'DH', 'options'=>['style' => 'font-family: Monaco, Consolas, monospace;']],
    ]
]); ?>
     </div><!-- form-group -->
    </div><!-- col-sm-6 -->

     <div class="col-sm-6">
            <div class="form-group">                             
                    <?= $form->field($model, 'website',['addon' => [ 
                        'prepend' => [ ['content' => '<i class=" fa fa-globe" color:"blue"></i>'],],
        
    ]
]) ?>    
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">
                    <?= $form->field($model, 'facebook', ['addon' => [ 'prepend' => [['content' => '<i class=" fa  fa-facebook-square" color:"blue"></i>'], ],]]) ?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->

    <div class="col-sm-6">
            <div class="form-group">
                   <?= $form->field($model, 'twitter', ['addon' => [ 'prepend' => [['content' => '<i class=" fa fa-twitter" color:"blue"></i>'], ],]]) ?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->
    </div>

<div class="row">
    <div class="col-sm-6">
            <div class="form-group">
                 <?= $form->field($model, 'google_plus', ['addon' => [ 'prepend' => [['content' => '<i class=" fa fa-google-plus" color:"blue"></i>'], ],]]) ?>
            </div><!-- form-group -->
    </div><!-- col-sm-6 -->
    
    <div class="col-sm-6">
            <div class="form-group">
                 <?= $form->field($model, 'trip_advisor',['addon' => [ 'prepend' => [['content' => '<i class="fa fa-paper-plane color:"blue"></i>'],],]]) ?>
            </div><!-- form-group -->
    </div><!-- col-sm-6 -->
</div>
    <div class="row">
    <div class="col-sm-6">
            <div class="form-group">
                    <?= $form->field($model, 'instagram', [
    'addon' => [ 
        'prepend' => [
            ['content' => '<i class="fa  fa-instagram" color:"blue"></i>'],
        ],
        
    ]
])?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->
    
    
    <div class="col-sm-6">
            <div class="form-group">
                    <?= $form->field($model, 'youtube', [
    'addon' => [ 
        'prepend' => [
            ['content' => '<i class="fa fa-youtube-play" color:"blue"></i>'],
        ],
        
    ]
]) ?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->
    
    
    <div class="col-sm-12">
            <div class="form-group">
                <?= $form->field($model, 'description' )->textarea(['rows' => '6']) ?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->
    </div>
</div>

   <div class="panel-footer">
    <button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>
    </div>
    </div></div>

  <?php ActiveForm::end(); ?>