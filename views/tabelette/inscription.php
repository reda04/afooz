<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="site-login">

      <body class="signin">
        
      


      

   <section>
</br>
</br>
</br>
</br>
</br>
</br>
   <div class="panel panel-signin ">
                
<div class="col-md-6">
   
   <?php 
    $form = ActiveForm::begin(); ?>

   

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

  <div class="col-sm-6">
            <div class="form-group">
                  <?= $form->field($model, 'password' )->textInput(['maxlength' => true]) ?>
  </div>
   </div>
    </div>


    </div><!-- col-sm-6 -->
       <?php 
    $form = ActiveForm::end(); ?>
