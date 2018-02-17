<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

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
         <?php $form = ActiveForm::begin(); ?>
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                          <div class="panel-btns" style="display: none;">
                              <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                              <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                          </div><!-- panel-btns -->
                           <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                           <p>Merci de remplir le formulaire ci-dessous</p>
                      </div>
                      <div class="panel-body">
                          <div class="row"> 
                            <div class="col-sm-6">
                              


    <div class="form-group">


   

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
 </div><!-- form-group -->
    </div><!-- col-sm-6 -->

     <div class="col-sm-6">
            <div class="form-group">   
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div><!-- form-group -->
    </div><!-- col-sm-6 -->

    <div class="col-sm-6">
            <div class="form-group">
    <?= $form->field($model, 'gender')->dropDownList([ 'Femme' => 'Femme', 'Homme' => 'Homme', ], ['prompt' => '']) ?>

   </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">

    <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Entrez vôtre date de naissance ...'],
    'pluginOptions' => [
        'autoclose'=>true,

        'format' => 'yyyy-mm-dd'
    
    ]
]); ?>
   
     </div><!-- form-group -->
    </div><!-- col-sm-6 -->

    <div class="col-sm-6">
            <div class="form-group">
 
<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
       </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">


    <?= $form->field($model, 'country_id')->dropDownList(  \yii\helpers\ArrayHelper::map($model->getcountries(),'id','nom_fr_fr' ), ['prompt'=>''] )  ?>

    </div><!-- form-group -->
    </div><!-- col-sm-6 -->

    <div class="col-sm-6">
            <div class="form-group">

      <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
       </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
<div class="row">
    <div class="col-sm-6">
            <div class="form-group">
                  <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

  </div>
  </div>
  <div class="col-sm-6">
            <div class="form-group">
                  <?= $form->field($model, 'password' )->textInput(['maxlength' => true]) ?>
  </div>
   </div>
    </div>

<div class="row">
    <div class="col-sm-4">
           
            <div class="form-group">
<?= $form->field($model, 'active')->widget(SwitchInput::classname(), [ 'pluginOptions' => [
        'onText' => 'Oui',
        'offText' => 'Non',
    ] ]) ?>
    </div><!-- form-group -->
    </div>
      <div class="col-sm-4">
           
            <div class="form-group">
    <?= $form->field($model, 'optin_email')->widget(SwitchInput::classname(), [ 'pluginOptions' => [
        'onText' => 'Oui',
        'offText' => 'Non',
    ] ]) ?>
    </div><!-- form-group -->
    </div>
     <div class="col-sm-4">
           
            <div class="form-group">
    <?= $form->field($model, 'optin_sms')->widget(SwitchInput::classname(), [ 'pluginOptions' => [
        'onText' => 'Oui',
        'offText' => 'Non',
    ] ]) ?>

      </div><!-- form-group -->
    </div><!-- col-sm-6 -->
  </div>
  </div>



 <div class="panel-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary mr5' : 'btn btn-primary mr5']) ?>
     
             </div>
      <?php $form = ActiveForm::end(); ?>
  
  
  