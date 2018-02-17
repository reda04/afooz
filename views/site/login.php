<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';

?>
<div class="site-login">

      <body class="signin">
        
      


      


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
     <?php 

                if ($model->hasErrors() ) { 

                

                    echo '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';

                              if(!empty($model->getFirstErrors()['username'])){

                                echo $model->getFirstErrors()['username'];
                              }


                              if(!empty($model->getFirstErrors()['password'])){

                                echo $model->getFirstErrors()['password'];

                              }

                              if(!empty($model->getFirstErrors()['connecter'])){

                                echo $model->getFirstErrors()['connecter'];

                              }
                              
                    echo '</div>';
                    
                    }
                ?>  

<div class="input-group mb15">
   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <?= $form->field($model, 'username')->textInput([
            'class' => "form-control",
            'placeholder' => "Utilisateur ou Email",]) ?>
        </div>
<div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <?= $form->field($model, 'password')->passwordInput([
            'class' => "form-control",
            'placeholder' => "Mot de Passe ",
        ]) ?>
</div><div class="clearfix">
                            <div class="pull-left">
                                
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"ckbox ckbox-primary mt10\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
 </div>
        <div class="pull-right">
           
                <?= Html::submitButton('Se connecter', ['class' => 'btn btn-success', 'name' => 'connecter']) ?>
           
        </div>

</div>
</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
   

 </section>
 </body>