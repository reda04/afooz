<?php

use yii\helpers\Html;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use app\models\UserPermissions;
/* @var $this yii\web\View */
/* @var $model app\models\User */

/* @var $form yii\widgets\ActiveForm */
$points = UserPermissions::find()->select('pointsdeventes')->where(['user_id'=>Yii::$app->user->identity->id])->one();
$serie =  $points['pointsdeventes'];
$liste = \yii\helpers\ArrayHelper::map(unserialize($serie),'point_de_vente_id','nom');

if(!$model->isNewRecord) {
   $i=0;
   $obj=UserPermissions::find()->select('pointsdeventes')->where(['user_id'=>$model->id])->one();
$point2= unserialize($obj['pointsdeventes']);
if(!empty($point2))
{
foreach ($point2 as $record) {
   $arr[$i]=$record['point_de_vente_id'];
   $i++;
}
$per_vente->pointsdeventes=$arr;
}
}

?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-lock"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="<?= Url::to(['acl/index'])  ?>">Gestion des utilisateurs</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->
<div class="user-form" >

<div class="contentpanel">  
    <div class="row">
        <div class="col-md-9">

   <?php 
    $form = ActiveForm::begin(
    ); 

     ?><div class="panel panel-default">
                    <div class="panel-heading">                       
                        <h4 class="panel-title">Merci de remplir le formulaire cd-dessous</h4>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <legend>Identification de l'utilisateur</legend>
<?= $form->field($model, 'username')->label('<span style="color:red">* </span>Nom d\' utilisateur * :' )  ?>               
<?= $form->field($model, 'email')->label('<span style="color:red">* </span>Email :' )  ?>
<?php 
  if($model->isNewRecord) {
   	echo $form->field($model, 'password')->PasswordInput()->label('<span style="color:red">* </span>Mot de passe :' );
	}
     ?>
   
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Nom:' )  ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Prenom:' )  ?>
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Téléphone:' )  ?>


        
<legend>Points de vente accessibles par cet utilisateur</legend>
  <div class="panel panel-info">
                                    <div class="panel-heading">



                                        <h3 style='color:#3A87A;'><strong>Accès à tous les points de vente par défaut</strong></h3>



                                        <p style='color:black'>
                                       Décochez les points de vente auxquels vous souhaitez limiter l'accès.</p>





  </div>
    </div>
  <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title">Liste de points de ventes : </h3>

                                    </div>
                                    <div class="panel-body" style="display: block;">
                                           <div class="form_group" style="display: block;">
<?= $form->field($per_vente, 'pointsdeventes')->label(false)->checkboxList($liste)?>
</div>
                                    </div>
                                </div>
                               
<legend>Sections accessibles par cet utilisateur</legend>


 
 <div class="panel panel-info">
                                    <div class="panel-heading">



                                        <h3 style=' color:#3A87A ;'><strong>Accès à toutes les sections par défaut</strong></h3>



                                        <p style='color:black'>
                                      Décochez les sections auxquelles vous souhaitez limiter l'accès.</p>
  </div>
                                </div>

                             
                                      <p><h3 style='color:#3A87A;'><strong>IPAD</strong></h3></p>
                                     <p><h4 style='color:#3A87A;'> accès aux informations de l'ipad</h4></p>
   <?php 
   $data = [ 1=> 'Oui' ,0=> 'Non'];
echo $form->field($permission, 'ipad')->radioButtonGroup($data, [
    'class' => 'btn-group ',
    'id'=> 'switchbutton1',

    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h3 style='color:#3A87A;'><strong>Base Clients</strong></h3></p>
 <p><h4 style='color:#3A87A;'> Accès à la base Clients</h4></p>
 <?php 
  
echo $form->field($permission, 'base_clients')->radioButtonGroup($data, [
    'class' => 'btn-group ',
    'id'=> 'switchbutton2',

    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
  <p><h4 style='color:#3A87A;'> Gestion des ciblages</h4></p>
  
   <?php 
  
echo $form->field($permission, 'gestion_ciblages')->radioButtonGroup($data, [
    'class' => 'btn-group ',
    'id'=> 'switchbutton3',
   
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
  <p><h3 style='color:#3A87A;'><strong>Campagnes Marketing</strong></h3></p>
  <p><h4 style='color:#3A87A;'>Envoi d'e-mails</h4></p>
  <?php 
  
    echo $form->field($permission, 'envoi_emails')->radioButtonGroup($data, [
    'class' => 'btn-group ','id'=> 'switchbutton4',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Envoi de SMS</h4></p>
  
  <?php 
  
    echo $form->field($permission, 'envoi_sms')->radioButtonGroup($data, [
    'class' => 'btn-group ','id'=> 'switchbutton5',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Envoi de notifications push</h4></p>
 <?php 
  
    echo $form->field($permission, 'envoi_notifications_pushs')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton6',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
  <p><h3 style='color:#3A87A;'><strong>Messages automatiques</strong></h3></p>
  <p><h4 style='color:#3A87A;'>Réglage des messages automatiques</h4></p>

   <?php 
  
    echo $form->field($permission,'messages_automatiques')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton7',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h3 style='color:#3A87A;'><strong>Statistiques</strong></h3></p>
  <p><h4 style='color:#3A87A;'>Accès aux statistiques</h4></p>
  <?php 
  
    echo $form->field($permission, 'statistiques')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton8',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
  <p><h3 style='color:#3A87A;'><strong>Réglages</strong></h3></p>
  <p><h4 style='color:#3A87A;'>Description de l'enseigne</h4></p>
  <?php 
  
    echo $form->field($permission, 'description_enseigne')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton9',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
  <p><h4 style='color:#3A87A;'> Modification du logo</h4></p>
<?php 
  
    echo $form->field($permission, 'modification_logo')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton10',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Gestion des slides</h4></p>
<?php 
  
    echo $form->field($permission, 'slides')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton11',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Gestion des offres de fidélité</h4></p>
<?php 
  
    echo $form->field($permission, 'offres_de_fidelite')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton12',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Options de l'enseigne</h4></p>

<?php 
  
    echo $form->field($permission, 'fidelisation')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton13',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h4 style='color:#3A87A;'>Configuration du parrainage</h4></p>
 <?php 
  
    echo $form->field($permission, 'parrainage')->radioButtonGroup($data, [
    'class' => 'btn-group ',
    'id'=> 'switchbutton14',
    
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
 <p><h3 style='color:#3A87A;'><strong>Droits d'accès</strong></h3></p>
  <p><h4 style='color:#3A87A;'>Création d'utilisateurs et affectation de droits</h4></p>
  <?php 
  
    echo $form->field($permission, 'gestion_des_droits')->radioButtonGroup($data, [
    'class' => 'btn-group ',   'id'=> 'switchbutton15',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-default .btn-bordered ']]])->label(false);

 ?>
                    <!-- panel-body -->
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3"> 
<div class="form-group"><button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>&nbsp;</div><div style="display:none;"></div></form> </div>

        </div>
      </div>
                      </div>
                    </div><!-- panel-footer -->  
                </div>
            <?php
$script = <<< JS
  
    $('label ').on('click', function(e) {
      if($(this).text() == ' Oui'){
         $(this).css("background-color", "#00a65a");
         $(this).css("color", "white");
         $(this).siblings().css("color", "#636E7B");
         $(this).siblings().css("background-color", "#E4E7EA");
        }else if($(this).text() == ' Non'){
         $(this).css("background-color", "#c9302c");
         $(this).css("color", "white");
         $(this).siblings().css("color", "#636E7B");
         $(this).siblings().css("background-color", "#E4E7EA");   
        }
    });




  


  
      for(i=1;i<16;i++){
      
       if($('#switchbutton'+i+' label:first-child').hasClass('active') ){
          $('#switchbutton'+i+' label:first-child').css("background-color", "#00a65a");
         $('#switchbutton'+i+' label:first-child').css("color", "white");
         $('#switchbutton'+i+' label:first-child').siblings().css("color", "#636E7B");
         $('#switchbutton'+i+' label:first-child').siblings().css("background-color", "#E4E7EA");
        }else if($('#switchbutton'+i+' label:last-child').hasClass('active')){
         $('#switchbutton'+i+' label:last-child').css("background-color", "#c9302c");
         $('#switchbutton'+i+' label:last-child').css("color", "white");
         $('#switchbutton'+i+' label:last-child').siblings().css("color", "#636E7B");
         $('#switchbutton'+i+' label:last-child').siblings().css("background-color", "#E4E7EA");   
        }
  
      }

   



JS;
$this->registerJs($script); 
?>


    <?php
   
     ActiveForm::end(); ?>

  </div><!-- col-md-6 -->
    </div>                   
</div>
