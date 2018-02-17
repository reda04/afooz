  <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
    $form = ActiveForm::begin(); ?>
    <legend>Saisisez vôtre QR-CODE</legend>
  <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label(false) ?>
   <?= $form->field($conso, 'montant_depense')->textInput(['maxlength' => true])->label(false) ?>

    <?php 
echo ' <button type="submit" class="button button-primary"> Enregistrer </button>';
    /*if(Yii::$app->user->identity->enseigneEnseigne->passage_or_amount == "amount")
    {
   

    	echo '<legend>Saisisez Le montant depensé </legend> ';
    	 	
    	echo ' <input type="number"  class="form-control" name="amount" value="1" min="1" aria-invalid="false">';
    	echo ' <button type="submit" class="button button-primary"> Enregistrer </button>';
    
    }*/
    $form = ActiveForm::end(); ?>
