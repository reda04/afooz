
<?php
use yii\helpers\Url;
use kartik\form\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;

use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
$logo=\Yii::$app->user->identity->enseigneEnseigne->logo;


?>
  
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

      

        <link href="css/style.default.css" rel="stylesheet">

       
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                         <img class="img-circle" src=<?= Url::to('@web'.str_replace('/basic/web','',Yii::$app->user->identity->enseigneEnseigne->logo ))?>  style="border-color:white ;  max-height: 150px; max-width: 150px; " alt="">
                    </div>
                    <br />
        
                    <div class="mb30"></div>
                   
                       <div class="pull-left">
                                <button value="<?=   Url::to(['tabelette/login']) ?>" id="membre" class="btn btn-success">Déja membre<i class="fa fa-angle-right ml5"></i></button>
                            </div> 
                       
                            <div class="pull-right">
                                <a href="<?=   Url::to(['tabelette/inscription']) ?>" id="inscription" class="btn btn-success" >Inscription<i class="fa fa-angle-right ml5"></i></a>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
               
            </div><!-- panel -->
            
        </section>
             <?php   Modal::begin(['id' =>'modal',
                  'header' =>'<h4> Authentification: </h4>',
                  'size' =>'modal-lg'
                  ]);
                echo '  <div id="Modal-content"> </div>';
    Modal::end();// echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php
$script = <<< JS
   $(function()
   {
    $("#membre").click(function ()
    {
      $("#modal").modal("show").find("#Modal-content").load($(this).attr('value'));
    });
 $('#modal').removeAttr('tabindex');


   }



    );
   
JS;
$this->registerJs($script); 

?>