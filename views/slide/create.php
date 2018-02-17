<?php

use yii\helpers\Html;


use yii\helpers\Url;
use app\models\User;

use kartik\widgets\FileInput;
use yii\widgets\ActiveForm;

$this->title = 'Create Slide';

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
              <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                          <div class="panel-btns" style="display: none;">
                              <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                              <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                          </div><!-- panel-btns -->
                           <h4 class="panel-title">Merci de remplir le formulaire ci-dessous</h4>
                           
                      </div>
                      <div class="panel-body">
                        



<?php

$form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]);
echo $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
  'options' => ['accept' => 'image/*','multiple'=> true  ], 'pluginOptions' => [
        'initialPreview'=>[
          "C:\Users\hp\Desktop\slides\slide1.png",
          "C:\Users\hp\Desktop\slides\slide2.png",
          "C:\Users\hp\Desktop\slides\slide3.png",
        ],
         'showRemove'=>true,
        'initialPreviewAsData'=>true,
        'initialCaption'=> Yii::$app->user->identity->username."_logo",
        'initialPreviewConfig' => [['caption' => Yii::$app->user->identity->username.'_logo', 'size' => '1287883'],],]])->label('Fichier de type image (.jpg, .gif, .png) qui sera utilisé pour représenter l\'enseigne :',['class'=>'control-labels']);
ActiveForm::end();
