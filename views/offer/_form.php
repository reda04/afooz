<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\offer */
/* @var $form yii\widgets\ActiveForm */
  $model->enseigne_id=\Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin();
     ?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                 <li>Réglages </li>
                <li><a href="<?= Url::to(['offer/index'])  ?>">Gestion de mes offres</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div><!--

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
                          
                          <div class="type-commerce-form">
<div class="contentpanel">  
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
                    <div class="panel-heading">   
                           <h4 class="panel-title">Merci de remplir le formulaire ci-dessous</h4>
                           
                      </div>


                      <div class="panel-body">
                        <div class="callout callout-info">
                          <div class="alert alert-info fade in nomargin">
  <h4><strong>Note</strong></h4>
  <p style='color:black;'>En indiquant précisément la valeur de l'offre , vous pourrez savoir combien vous coûtent vos offres de fidélité..</p>
</div>
</div>
<p> <p>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'points')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>

   </div><!-- row -->
                    <!-- panel-body -->
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3"> 
      
    </div>
                      </div>
                    </div><!-- panel-footer -->  
                </div>

    <?php ActiveForm::end(); ?>

</div>
