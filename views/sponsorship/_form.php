<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sponsorship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sponsorship-form">

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
                <li><a href="<?= Url::to(['Sponsorship/index'])  ?>">Gestion du parrainage</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div>
<div class="contentpanel">   
<div class=" col-md-12">
    <p class="lead">   Modifier les slides présentés sur les bornes iPad</p>  
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                       
                                        <h3 style='color:#3A87AD'>A quoi servent les slides ?</h3>
                                    
                                    
  
    <p style='color:black'>Les slides apparaissent sur l'écran de votre iPad et servent de support à vos différentes opérations marketing et commerciales.<br>
    La taille idéal d'un slide est 1080 pixels par 636 pixels. Seules les images fixes (jpg ou png) sont acceptées, les images animées (gif ou flash) ne fonctionneront pas.<br>Les slides ci-dessous sont les slides par défaut d'AFOZ. Pour utiliser vos propres images, cliquez sur "Ajouter un slide"</p>
</div>
</div>

    <?= $form->field($model, 'active')->dropDownList([ 'oui' => 'Oui', 'non' => 'Non', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'max_referrals')->textInput() ?>

    <?= $form->field($model, 'pts_sponsor')->textInput() ?>

    <?= $form->field($model, 'pts_referral')->textInput() ?>

    <?= $form->field($model, 'delay')->textInput() ?>

    <?= $form->field($model, 'enseigne_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
