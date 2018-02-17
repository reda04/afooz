<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Initialisation de mot de passe';

?>
<div class="site-login">

      <body class="signin">
        
      


      

   <section>
</br>
</br>
</br>
</br>
</br>
</br>
   <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src=<?= Url::to('@web/images/logo-primary.png'); ?>  alt="TWC Logo" >
                    </div>
                   
                   
                    
                    <div class="mb30"></div>
                    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
   
        'fieldConfig' => [
            'template' => "{input}",
             'options' => [
            'tag' => false,
        ],
          
        ],
    ]); ?>

    

<div class="input-group mb15">
   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <?= $form->field($model, 'login')->textInput([
            'class' => "form-control",
            'placeholder' => "Login",
            'disabled'=>""]) ?>
        </div>
<div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <?= $form->field($model, 'password1')->passwordInput([
            'class' => "form-control",
            'placeholder' => "Nouveau mot de passe ",
        ]) ?>
</div>

<div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <?= $form->field($model, 'password2')->passwordInput([
            'class' => "form-control",
            'placeholder' => "Confirmer le nouveau mot de passe",
        ]) ?>
</div>


<div class="clearfix">
       
        <div class="pull-right">
           
                <?= Html::submitButton('Valider', ['class' => 'btn btn-success', 'name' => 'connecter']) ?>
           
        </div>

</div>
</div>

 <?php ActiveForm::end(); ?>

</div>
</div>
   

 </section>
 </body>