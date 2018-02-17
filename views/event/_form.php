<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                  <li>Réglages Super-Admin </li>
                <li><a href="<?= Url::to(['event/index'])  ?>">Gestion des événements</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div>

<div class="event-form">
	<div class="contentpanel">  
    <div class="row">
        <div class="col-md-9">
    <?php $form = ActiveForm::begin(); ?>
 <div class="panel panel-default">
                    <div class="panel-heading">                       
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="row"> 
    <?= $form->field($model, 'event_type')->textInput(['maxlength' => true]) ?>

   

   
  </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
        <?= Html::submitButton($model->isNewRecord ? 'Créer' : 'Mettre à jour', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
                      </div>
                    </div><!-- panel-footer -->  
                </div>
    <?php ActiveForm::end(); ?>

</div>
