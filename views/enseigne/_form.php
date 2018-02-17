<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\User;
use yii\web\View ;
use yii\widgets\MaskedInput;

/* @var $model app\models\Enseigne */
/* @var $form yii\widgets\ActiveForm */


   $this->registerJs( '
            jQuery(document).ready(function() {



function hasWhiteSpace(s) {
  return /\s/g.test(s);
}


$("#user-username").on("change", function(){

    if(hasWhiteSpace($("#user-username").val()))
    {
        $("#user-username").attr("aria-invalid","true");
        $("#user-username").parent().attr("class","form-group field-user-username required has-error");
        $("#user-username").append("<p > Ne doît pas contenir d\'espaces </p>");
    }
    


  });
            
     
                // Progress Wizard
                jQuery("#w0").bootstrapWizard({
                    onTabShow: function(tab, navigation, index) {
                        tab.prevAll().addClass("done");
                        tab.nextAll().removeClass("done");
                        tab.removeClass("done");
                        
                        var $total = navigation.find("li").length;
                        var $current = index + 1;
                        
                        if($current >= $total) {
                            $("#w0").find(".wizard .next").addClass("hide");
                            $("#w0").find(".wizard .finish").removeClass("hide");
                        } else {
                            $("#w0").find(".wizard .next").removeClass("hide");
                            $("#w0").find(".wizard .finish").addClass("hide");
                        }
                        
                        var $percent = ($current/$total) * 100;
                        $("#w0").find(".progress-bar").css("width", $percent+"%");
                    }
                });
            });
        
' ,View::POS_END);





?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="<?= Url::to(['enseigne/index'])  ?>">Gestion des enseignes</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div>

<div class="criteres-form">
    <div class="contentpanel">  
    <div class="row">
        <div class="col-md-9">
         


           
    <?php $form = ActiveForm::begin(  [
           
            'options' => [
                'class' => 'panel-wizard'
             ]
        ]); ?>

  
 <div class="panel panel-default">
                    <div class="panel-heading">                       
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                                <ul class="nav nav-justified nav-wizard ">
                                        <li class="active"><a href="#tab1" data-toggle="tab"><strong>Etape 1:</strong>  Informations sur l'enseigne </a></li>
                                        <li class=""><a href="#tab2" data-toggle="tab"><strong>Etape 2:</strong> Point de vente principal </a></li>
                                        <li class=""><a href="#tab3" data-toggle="tab"><strong>Etape 3:</strong> Initialisation d'un uilisateur</a></li>
                               
                                    </ul>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style='width: 50%'></div>
                                    </div>
   



<div class="tab-content">

                                        <div class="tab-pane active" id="tab1">
                                            <div class="form-group">
                                                   <legend> Enseigne:</legend>
                                                <label class="col-sm-4">Nom de l'enseigne</label>
                                                <div class="col-sm-8">
                                                 
                                            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div><!-- form-group -->
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4">Email de contact</label>
                                                <div class="col-sm-8">
                                             <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div><!-- form-group -->
                                             <div class="form-group">
                                                <label class="col-sm-4">Numéro de télephone de l'enseigne:</label>
                                                <div class="col-sm-8">
                                                <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true , 'autocomplete' => 'off' ])->label(false)?>
                                           
                                                </div>
                                            </div><!-- form-group -->
                                   <!-- tab-pane -->
                                
                                            
                                            <div class="form-group">
                                                <div class="form-group">
                                                <label class="col-sm-4">Type de Commerce </label>
                                                <div class="col-sm-8">
                                                <?=$form->field($model, 'Type_commerce_ID')->dropDownList(  \yii\helpers\ArrayHelper::map($model->getTypec(),'ID','Nom' ), ['prompt'=>''] )->label(false)?>
                                                </div>
                                            </div><!-- form-group -->

                                               
                                            <div class="form-group">
                                                <label class="col-sm-4">Nombres de points de ventes autorisés</label>
                                                <div class="col-sm-8">
                                                <?= $form->field($model, 'Nbre_points_vente')->textInput([ 'type' => 'number' , 'min' => 1])->label(false)?>
                                                </div>
                                            </div>
                                               </div>
                                                </div>
                                            <div class="tab-pane" id="tab2">
                                             <legend>Point de vente Principal:</legend><!-- form-group -->

                                                     <div class="form-group">
                                                <label class="col-sm-4">Nom </label>
                                                <div class="col-sm-8">
                                                <?= $form->field($point, 'nom')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div> 
                                                <div class="form-group">
                                                <label class="col-sm-4">adresse </label>
                                                <div class="col-sm-8">
                                                <?= $form->field($point, 'adresse')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div> 
                                                <div class="form-group">
                                                <label class="col-sm-4">lattitude</label>
                                                <div class="col-sm-8">
                                                <?= $form->field($point, 'lattitude')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div> 
                                                <div class="form-group">
                                                <label class="col-sm-4">longitude</label>
                                                <div class="col-sm-8">
                                                <?= $form->field($point, 'longitude')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div>  

                                        </div><!-- tab-pane -->
                               
                                    
                                        <div class="tab-pane" id="tab3">
                                                <legend> Administrateur de l'enseigne:</legend>
                                            <div class="form-group">
                                            <label class="col-sm-4">Login</label>
                                                <div class="col-sm-8">
                                             <?= $form->field($user, 'username')->textInput(['trim' => true])->label(false)?>
                                                </div>
                                            </div><!-- form-group -->
                                            
                                           
                                            
                                             <div class="form-group">
                                                 <label class="col-sm-4">Nom</label>
                                                    <div class="col-sm-8">
                                                   <?= $form->field($user, 'last_name')->textInput(['maxlength' => true])->label(false)?>
                                                    </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-sm-4">Prénom</label>
                                                <div class="col-sm-8">
                                    <?= $form->field($user, 'first_name')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-sm-4">Email</label>
                                                <div class="col-sm-8">
                                     <?= $form->field($user, 'email')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4">Numéro de télephone</label>
                                                <div class="col-sm-8">
                                     <?= $form->field($user, 'phone_number')->textInput(['maxlength' => true])->label(false)?>
                                                </div>
                                            </div>
           

                                        </div>
                                         </div>
                                      

                 
                                        <ul class="list-unstyled wizard">
                                        <li class="pull-left previous disabled"><button type="button" class="btn btn-default">Précedent</button></li>
                                        <li class="pull-right next"><button type="button" class="btn btn-primary">Suivant</button></li>
                                        <li class="pull-right finish hide"><?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Terminer', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?></li>
                                    </ul>
                                    </ul>
                   </div>







    <?php ActiveForm::end(); ?>
  