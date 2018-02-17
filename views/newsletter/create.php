<?php

use yii\helpers\Html;
use kartik\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Newsletter */

$this->title = 'Newsletters';

?>
<div class="newsletter-create">
   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-envelope-o"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Campagnes marketing </li>
                <li>E-mails</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4>Créer une Newsletter</h4>
        </div>
    </div><!-- media -->
</div>
<div class="criteres-form">
    <div class="contentpanel">  
              <div class="col-md-12">
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
if (Yii::$app->session->hasFlash('success'))
{
echo Alert::widget([
    'type' => Alert::TYPE_WARNING,
    'title' => 'Attention!',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => 'Votre adresse e-mail de contact n\'est pas renseignée. Si vous souhaitez que vos clients puissent répondre à vos e-mails, il vous suffit de renseigner cette adresse dans <a href='.Url::to(["enseigne/desc"]).' > les réglages de vôtre enseigne</a>',
    'showSeparator' => true,
    'delay' => false
]);
}
   
   ?>
 <div class="panel panel-info">
                                    <div class="panel-heading">



                                        <h3 style='color:#3A87A;'><strong>Vous ne parvenez pas à envoyer votre newsletter dans le format que vous souhaitez ?</strong></h3>



                                        <p style='color:black'>
                                        <p>Les outils proposés dans cette page vous permettent de construire rapidement et simplement un e-mail de communication avec vos clients.
                                        <br>Si vous avez un format de newsletter spécifique que vous souhaiteriez envoyer, n'hésitez pas à nous en faire la demande par 
                                        <a href="mailto:contact@afooz.ma">e-mail</a>. Nous nous ferons un plaisir d'y répondre.</p></p>
  </div>
                                </div>
 </div> 
<div class="row"> 
     <div class="col-sm-6">
            <div class="form-group"> 
<?php 
    $form = ActiveForm::begin();



     ?>
 <?= $form->field($model, 'send_on')->widget(DateTimePicker::classname(), [
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd hh:ii' 
    ]
])->label('Date et heure d\'envoi (laisser vide pour un envoi immédiat') ; ?>
 <?= $form->field($model,'filtre_id')->dropDownList(  \yii\helpers\ArrayHelper::map($filtres,'filter_id','name' ), ['prompt'=>'Tous les clients'] )->label('Filtre :' )  ?>
 <?= $form->field($model, 'point_de_vente_id')
  ->hiddenInput(['value' => $point])
  ->label(false) ?> 
 
                        
                                      
        
  </div>
                                </div>                          

  </div>


  <div class="row"><div class="col-xs-12"><?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('<span style="color:red">* </span>Description (cette information ne sera pas envoyée aux destinataires) :' )  ?></div></div>


<!--<div class="row">
  <div class="col-xs-12">
   <?php $form->field($model, 'message')->textarea()->label('Vôtre message : ') ?>
  </div>
</div> -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                               
                                <?= Html::a('Preview',['create'],['class'=>'btn btn-info']) ?>
                              
                               
                            </div><!-- panel-heading -->
                            <div class="panel-body nopadding">
                                <textarea id="code" name="code">
&lt;html style="color: green"&gt;
  &lt;!-- this is a comment --&gt;
  &lt;head&gt;
    &lt;title&gt;HTML Example&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    The indentation tries to be &lt;em&gt;somewhat &amp;quot;do what
    I mean&amp;quot;&lt;/em&gt;... but might not match your style.
  &lt;/body&gt;
&lt;/html&gt;
</textarea>   
                            </div><!-- panel-body -->
                        </div><!-- panel -->
<div class="form-group">
  
  <button name="submit" value="brouillon" class="btn-primary btn btn-large" type="submit">
 Enregistrer le brouillon</button>
 
<button name="submit" value="save" confirm="Cette newsletter va être envoyée et vous ne pourrez pas annuler son envoi, êtes-vous sûr de vouloir continuer ?" class="btn-success btn btn-large" type="submit">
  <i class="glyphicon glyphicon-send"></i> Envoyer</button>&nbsp;



</div>
                                </div>


</div>

           <?php
$script = <<< JS
  
   CodeMirror.fromTextArea(document.getElementById("code"), {
                mode: {name: "xml", alignCDATA: true},
                lineNumbers: true
            });
            
            CodeMirror.fromTextArea(document.getElementById("code2"), {
                mode: {name: "javascript"},
                lineNumbers: true,
                theme: 'ambiance'
            });
            
            var editor = CodeMirror.fromTextArea(document.getElementById("code3"), {
                mode: {name: "javascript"},
                lineNumbers: true,
            });
            CodeMirror.commands["selectAll"](editor);
            
            function getSelectedRange() {
                return { from: editor.getCursor(true), to: editor.getCursor(false) };
            }
              
            function autoFormatSelection() {
                var range = getSelectedRange();
                editor.autoFormatRange(range.from, range.to);
            }
              
            function commentSelection(isComment) {
                var range = getSelectedRange();
                editor.commentRange(isComment, range.from, range.to);
            }
            
            jQuery(document).ready(function(){
                
                jQuery('.autoformat').click(function(){
                    autoFormatSelection();
                });
                
                jQuery('.comment').click(function(){
                    commentSelection(true);
                });
                
                jQuery('.uncomment').click(function(){
                    commentSelection(false);
                });
            
            });



JS;
$this->registerJs($script); 
?>
<?php 
    $form = ActiveForm::end(); ?>
