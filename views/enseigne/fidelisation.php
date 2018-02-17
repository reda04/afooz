<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;
use app\models\User;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */
/* @var $form yii\widgets\ActiveForm */
$this->title='options de fidélisation';
  $this->registerJsFile('@web/js/passage_or_amount.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

    <style>
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default {
            background-color: #408bd6 !important;
            color: white !important;
        }
    </style>

    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-pencil"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Réglages</li>
                    <li>
                        <?= Html::encode($this->title) ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- media -->
    </div>

    <div class="criteres-form">
        <div class="contentpanel">
            <div class="row">
                <div class="col-md-12">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <?= Html::encode($this->title) ?>
                            </h4>
                        </div>
                        <!-- panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <legend>Informations à demander lors de l'inscription d'un client</legend>
                                <div class="control-label">Demander le nom du client lors de son inscription :</div>
                                <?php  

$data = ['Non' => 'Non', 'Optionnel'=> 'Optionnel', 'Obligatoire' => 'Obligatoire'];
echo $form->field($model, 'register_required_name')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn  btn-default ']]])->label(false);
 


    ?> Demander l'adresse email du client lors de son inscription :

                                <?php  


echo $form->field($model, 'register_required_email')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);
 


    ?> Demander le numéro de téléphone du client lors de son inscription :
                                <?php  

echo $form->field($model, 'register_required_phone')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);
 


    ?> Par défaut, vos clients acceptent de recevoir des communications demander le numéro de téléphone du client lors de son inscription :
                                <?php  


 $data = ['oui'=> 'Oui', 'non' => 'Non'];
echo $form->field($model, 'default_optin')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 

    ?>

                            </div>


                            <div class="row">
                                <legend>Calcul du nombre de points</legend>
                                <!-- row -->
                            </div>
                            <!-- panel-body -->
                            Points acquis lors de l'inscription :
                            <?= $form->field($model, 'pts_register')->textInput()->label(false); ?>

                                <div class="panel panel-info">
                                    <div class="panel-heading">

                                        <h3 style='color:#3A87A;'><strong>Points acquis par passage, ou en fonction du montant ?</strong></h3>



                                        <p style='color:black'>Le mode Passage ajoute un nombre de points fixe à chaque passage du client.</p>
                                        <p style='color:black'>Le mode Montant ajoute un nombre de points proportionnel au montant dépensé par le client.</p>
                                    </div>
                                </div>
                                Sélectionnez le mode de fonctionnement de la fidélité :
                                <?php  


$data = ['passage' => 'passage', 'amount' => 'montant'];
echo $form->field($model, 'passage_or_amount')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

    ?>
                                <div class="passage">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?= $form->field($model, 'pts_per_passage')->textInput([ 'type' => 'number' ])->label('Nombre de points attribués a chaque passage'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="montant">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?= $form->field($model, 'number_dirhams')->textInput([ 'type' => 'number' ])->label('Réglages valeur du montant en dirhams :'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?= $form->field($model, 'pts_per_dirham')->textInput([ 'type' => 'number' ])->label('nombre de points à attribuer pour chaque dirhams dépensé :'); ?>
                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <legend>Conditions pour utiliser ses points</legend>
                                    <div class="form-group">
                                        <?php     $data = [ 'non' => 'Non','oui'=> 'Oui'];
echo $form->field($model, 'register_to_use_points')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 

    ?>

                                        <div id="contactTooltip" style="display: none;">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h4><strong>Qu'est-ce qu'un moyen de contact ?</strong></h4>
                                                    <p style='color:black'>Les moyens de contact sont l'adresse e-mail et le numéro de téléphone.<br>Le client doit avoir renseigné au moins une de ces informations pour utiliser ses points de fidélité. Attention : cela ne signifie pas qu'il recevra et lira tous les emails ou SMS. Il peut par exemple se désinscrire de vos campagnes emails et il pourra toujours utiliser ses points de fidélité.</p>
                                                </div>
                                            </div>
                                            </div>
                          
                                                <div class="row">
                                                     <div class="col-xs-3">
                                            <?= $form->field($model, 'delay_before_checkin')->textInput([ 'type' => 'number' ])->label('Délai à respecter entre 2 passages (en heures)'); ?>
                                        </div>
                                                    
                                                
                                            </div>
                                </fieldset>
                                  <fieldset>
                                    <legend>Comportement des  bornes IPAD :</legend>
                                      <div class="row">
                                                     <div class="col-xs-2">
                                    <?= $form->field($model, 'ipad_pin')->passwordInput( )->label('Code PIN sur les bornes iPad :'); ?>
                                      </div>
                                      </div>

                                      Demander la saisie du code PIN pour accepter la récompense :
                                       <?php     $data = [ 'non' => 'Non','oui'=> 'Oui'];
echo $form->field($model, 'ipad_pin_reward')->radioButtonGroup($data, [
    'class' => 'btn-group-sm ',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 

    ?>
                                                    
                                                
                                         
                                    </fieldset>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-9 col-sm-offset-3">

                                            <button class="btn-default btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- panel-footer -->
                                </div>

                                <?php ActiveForm::end(); ?>

                                </div>
                        </div>
                    </div>