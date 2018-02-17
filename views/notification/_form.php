<?php

use yii\helpers\Html;

use kartik\widgets\DateTimePicker;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.btn-group label.btn.btn-default{
  background-color: white;
}
.btn-group label.btn.btn-default.active {
    color: white;
    background-color: #318EE7;
    border-color: #285e8e;
}
</style>
<div class="customer-form">

    <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-sliders"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Réglages </li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->




<div class="criteres-form">
    <div class="contentpanel">  
         <?php $form = ActiveForm::begin(); ?> 
              <div class="panel panel-default">
                 <div class="panel-heading">
                      <div class="panel-btns" style="display: none;">
                          <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                          <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                      </div><!-- panel-btns -->
                       <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                       <p>Merci de remplir le formulaire ci-dessous</p>
                 </div>
                 <div class="panel-body">
                  
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                            
                              <?= $form->field($model, 'send_on')->widget(DateTimePicker::classname(), [
                                  'pluginOptions' => [
                                      'autoclose'=>true,
                                      'format' => 'yyyy-mm-dd hh:ii' 
                                  ],

                              ])->label('Date et heure d\'envoi (laisser vide pour un envoi immédiat) :') ; ?>

                            </div><!-- form-group -->
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                             
                              <?= $form->field($model, 'valid_to')->widget(DateTimePicker::classname(), [
                                  'pluginOptions' => [
                                      'autoclose'=>true,
                                      'format' => 'yyyy-mm-dd hh:ii' 
                                  ]
                              ])->label('Date de fin de validité (la notification sera affichée dans l\'application jusque cette date) :') ; ?>
                               
                            </div><!-- form-group -->
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                            
                              <?= $form->field($model,'filtre_id')->dropDownList(  \yii\helpers\ArrayHelper::map($filtres,'filter_id','name' ), ['prompt'=>'Tous les clients'] )->label('Filtre :' )  ?>
                             
                                                           
                            </div><!-- form-group -->
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                            
                              <label for="labelNumberOfUsers" class="control-label">Nombre d'utilisateurs :</label>
                              
                             
                                                           
                            </div><!-- form-group -->
                        </div>
                      </div>
                      

                       
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                              <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Titre (apparait sur l\'écran du téléphone même lorsqu\'il est verrouillé) :') ?>
                            </div><!-- form-group -->
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label>Icône représentant votre notification : </label>
                               <?php
                                    $news='<img class="icon-news" src="https://manager.qoodos.fr/img/news-icons/news.png" style="width:50px;height:50px;"> Information';

                                    $gift='<img class="icon-news" src="https://manager.qoodos.fr/img/news-icons/gift.png" style="width:50px;height:50px;"> Cadeau';

                                    $discount='<img class="icon-news" src="https://manager.qoodos.fr/img/news-icons/discount.png" style="width:50px;height:50px;"> Réduction';

                                    $birthday='<img class="icon-news" src="https://manager.qoodos.fr/img/news-icons/birthday.png" style="width:50px;height:50px;"> Anniversaire';

                                    $data = [ 'news' =>$news , 'gift' => $gift, 'discount' => $discount, 'birthday' => $birthday, ];
                                    $model->icon =   $model->isNewRecord ? 'news' : $model->icon;
                                    echo $form->field($model, 'icon')->radioButtonGroup($data)->label(false);
                                ?>
                            </div><!-- form-group -->
                        </div>
                      </div>

                      
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                              <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Description (cette information ne sera pas envoyée aux destinataires) :') ?>
                            </div><!-- form-group -->
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group">
                              <?= $form->field($model, 'contents')->textarea(['rows' => 6])->label('Contenu : ') ?>
                            </div><!-- form-group -->
                        </div>
                      </div>
                      
                 </div>
                 <div class="panel-footer">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-edit"></i> Enregistrer le brouillon' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                 </div>
              </div>
               <?php
$script = <<< JS
  
    

      
  


  
      
      
       


         
        
     

   



JS;
$this->registerJs($script); 
?>
              
         <?php ActiveForm::end(); ?>
    </div>
</div>



    

    

    


   

    


