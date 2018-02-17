<?php

use yii\helpers\Html;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\User */
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
                <li><a href="<?= Url::to(['user/index'])  ?>">Gestion des utilisateurs</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->
<div class="user-form">

<div class="contentpanel">  
    <div class="row">
        <div class="col-md-9">

   <?php 
    $form = ActiveForm::begin([
        'id' => 'login-form-inline', 
        'type' => ActiveForm::TYPE_INLINE
    ]); 

     ?><div class="panel panel-default">
                    <div class="panel-heading">                       
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="row">    

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->PasswordInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
 
   
<?=$form->field($model, 'role_id')->dropDownList(  \yii\helpers\ArrayHelper::map($model->getRoles(),'role_id','name' ), ['prompt'=>''] ) ?>
 

   </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3"> 

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary mr5' : 'btn btn-primary mr5']) ?>
      </div>
                      </div>
                    </div><!-- panel-footer -->  
                </div>
    <?php
   
     ActiveForm::end(); ?>

  </div><!-- col-md-6 -->
    </div>                   
</div>
