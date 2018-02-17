<?php

use yii\helpers\Html;
use kartik\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DateTimePicker;
/* @var $model app\models\Newsletter */

$this->title = 'Créer un sms';

?>
<div class="newsletter-create">
	 <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-phone"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Campagnes marketing </li>
                <li>sms</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div>
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
                          <div class="row"> 

     <div class="col-sm-6">
            <div class="form-group"> 
    <?php 
                                $js = "


    jQuery(function($){

     
		$('form').submit(function(e){
			startAjaxWait($(this));
		});

		// Sender is always in uppercase
		$('#SmsSender').keyup(function(){
			this.value = this.value.toUpperCase();
		});


    });


";


    $form = ActiveForm::begin();
$this->registerJS($js,$this::POS_READY);
     ?>
 <?= $form->field($model, 'send_on')->widget(DateTimePicker::classname(), [
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd hh:ii' 
    ]
])->label('Date et heure d\'envoi (laisser vide pour un envoi immédiat') ; ?>
 <?= $form->field($model,'filtre_id')->dropDownList(  \yii\helpers\ArrayHelper::map($filtres,'filter_id','name' ), ['prompt'=>'Tous les clients'] )->label('Filtre :' )  ?>
 <?= $form->field($model, 'point_de_vente_id')
  ->hiddenInput(['value' => $point])
  ->label(false) ?> 
                        
                                      
        
  </div>
                                </div>                          

  </div>


  <div class="row"><div class="col-xs-12"><?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Description (cette information ne sera pas envoyée aux destinataires) :' )  ?></div></div>
     <div class="row"><div class="col-xs-12"> <?= $form->field($model, 'sender')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Emetteur (de 4 à 11 caractères)')?></div></div>

    <?= $form->field($model, 'message')->textarea(['maxlength' => true])->label('<span style="color:red">* </span>Message') ?>


<div class="form-group">
  
  <button name="submit" value="brouillon" class="btn-primary btn btn-large" type="submit">
    <i class="glyphicon glyphicon-edit"></i> Enregistrer le brouillon</button>
 
<button name="submit" value="save" confirm="Cette newsletter va être envoyée et vous ne pourrez pas annuler son envoi, êtes-vous sûr de vouloir continuer ?" class="btn-success btn btn-large" type="submit">
  <i class="glyphicon glyphicon-send"></i> Envoyer</button>&nbsp;</div>
                                </div>


</div>
<?php 
    $form = ActiveForm::end(); ?>