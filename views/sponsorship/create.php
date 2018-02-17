<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsorship */

$this->title = 'Parrainage';

?>
    <?php $form = ActiveForm::begin();
    ?>


<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                 <li>Réglages </li>
                <li><a href="<?= Url::to(['Sponsorship/index'])  ?>"><?= Html::encode($this->title)  ?></a></li>
         
            </ul>
        </div>
    </div>
    
    </div>
<div class="sponsorship-form">
<section class="content">
					<!-- affichage des message d'erreurs -->
					
					<!-- affichage du contenu -->
					

<div class=" col-md-offset-2 col-md-8 mt20 ">
    <p class="lead">   Options du parrainage</p>  
                               

		
	
				
					<div class="control-label">Activer le parrainage pour votre enseigne
					 
					<?= $form->field($model, 'active')->widget(SwitchInput::classname(), [ 'pluginOptions' => [
        'onText' => 'Oui',
        'offText' => 'Non',
    ] ]) ?>
			<div class="panel panel-info">
                                    <div class="panel-heading">
                                       
                                        <h3 ><strong>Nombre de filleuls autorisés ?</strong></h3>
                                    
                                    
  
    <p style='color:black'>Il s'agit du nombre de personnes que peut inviter un de vos clients. Si vous ne le renseignez pas la limite est fixée par Qoodos à 50 pour éviter le SPAM.</p>
</div>
</div	>		


        <?= $form->field($model, 'max_referrals')->textInput() ?>
        <?= $form->field($model, 'pts_sponsor')->textInput() ?>		
        <?= $form->field($model, 'pts_referral')->textInput() ?>	   
        <?= $form->field($model, 'delay')->textInput() ?>  <div class="callout callout-info">
	<div class="panel panel-info">
                                    <div class="panel-heading">
                                       
                                        <h3 ><strong>Pourquoi définir un délai ?</strong></h3>
                                    
                                    
  
    <p style='color:black'>Pour créer un sentiment d'urgence chez le filleul et l'inciter à passer dans votre boutique avant de perdre les points de fidélité promis par l'opération de parrainage. Ce délai dépend de votre activité, et nous préconisons de rester dans une fourchette comprise entre 30 et 90 jours.</p>
</div>
</div>
		<br>
		<div class="form-group"><button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>&nbsp;</div><div style="display:none;"></div></form>	</div>

        </div>
				</section>

    <div class="form-group">

    </div>

    <?php ActiveForm::end(); ?>

</div>
