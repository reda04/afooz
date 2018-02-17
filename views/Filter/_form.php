<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;

/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="<?= Url::to(['enseigne/dashboard'])  ?>"><i class="glyphicon glyphicon-home"></i>  Home</a></li>
                <li><a href="<?= Url::to(['filter/index'])  ?>">Ciblage</a></li>
                <li>Clients</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div>


    

<div class="filtrer-form">

    <div class="contentpanel">
    <?php $form = ActiveForm::begin(); ?>

<fieldset >
                    <legend>
                    <h1>
                  <?= Html::encode($this->title) ?>                   
                    </h1>
                    </legend>
                </fieldset>
<div class="col-md-9">
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



    <?php 


if($this->context->action->id == 'create')
{
   echo  $form->field($model, 'name')->textInput(['maxlength' => true , 'value'=>''])->label('Nom du filtre :') ; 

    
        if($nombre == count($pointdevente) and count($pointdevente))
        {
         $pointdevente[null]='Tout les points de ventes';
         $pointdevente = array_reverse($pointdevente, true); 
         
       }
          
    echo $form->field($model, 'point_de_vente_id')->dropDownList( $pointdevente)->label('Point de vente du filtre :');

}
     ?>

  </div>
    </div>
    
       



 
  <div class="panel-footer">
    <button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>
    </div>
       </div>   
    </div>

    <?php ActiveForm::end(); ?>


