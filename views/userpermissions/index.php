<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Newslettersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tous les comptes managers';

?>

 <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-lock"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Gestion des droits </li>
         
                <li><?= Html::encode($this->title) ?></li>
            </ul>
          
        </div>
    </div><!-- media -->
</div>



<div class="contentpanel">

<div class="criteres-form">
    <div class="contentpanel">  
         <div class="col-md-12">
            
         <h3><?= Html::encode($this->title) ?></h3>
                 <div class="panel panel-default">
                     <div class="panel-heading">
                          <h4>Comptes managers existants</h4>
                          </div>
                           <div class="panel-body">
                                <?php 
                                $layout = <<< HTML


<div class="clearfix"></div>
{custom}
<div class="clearfix"></div>
{items}
<div class="clearfix"></div>


<div class="col-md-6 text-align: right;">{pager}</div>

HTML;



    echo GridView::widget([
 // change the module identifier to use the respective module's settings
      'persistResize' => false,
        'dataProvider' => $dataprovider,
        'showPageSummary' => false,
        'hover' => true,   
        //'bootstrap'=>true,
        'bordered'=>false,
        'columns' => [           
        'user.last_name',
        'user.email',
            
     

         [     'attribute' => 'Actions',
               
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 50%;'],
                'format' => 'html',
                'vAlign'=>'middle',
                 'value' => function($model) {
  $s ='      <div class="form-group">   <a href="'. url::to(["userpermissions/update","id"=>$model->user_id]).'" class="btn btn-large btn-primary"><i class="fa fa-edit">   Permissions</i></a>   ';
//$s.='<button class="btn btn-large btn-info" value="'. url::to(["userpermissions/accountdetails","id"=>56]).'" id="ModalButton"><i class="fa fa-info"></i>  Détails</button>';
$s.='<a class="btn btn-large btn-info ddd"  href="#'. url::to(["userpermissions/accountdetails","id"=>$model->user_id]).'" ><i class="fa fa-info"></i>  Détails</a>';

     
               if($model->user->status)
               {
                $s.='  ';

       $s .=     Html::a("<i class=\"fa fa-trash \"></i> ".Yii::t('app', ' {modelClass}', [
                          'modelClass' => 'Désactiver',
                          ]), ['userpermissions/deactivate','id'=>$model->user_id], ['class' => 'btn btn-large btn-danger', 'id' => $model->user_id]);
               }
               else
               {
                $s.='  ';
                  $s .=     Html::a("<i class=\"fa fa-trash \"></i> ".Yii::t('app', ' {modelClass}', [
                          'modelClass' => 'Activer',
                          ]), ['userpermissions/activate','id'=>$model->user_id], ['class' => 'btn btn-large btn-success', 'id' => $model->user_id]);
               }
              

          
                
                return $s; 
        }
               
        ],
        

                ],

             'layout' => $layout,
                'replaceTags' => [
                    '{custom}' => function($widget) {
                        // you could call other widgets/custom code here
                        if ($widget->panel === false) {
                            return '';
                        } else {
                            return '';
                        }
                    }
                ],

            ]);

            ?> 
            </div>
                <?php   Modal::begin(['id' =>'modal',
                  'header' =>'<h4>Info Utilisateur :</h4>',
                  'size' =>'modal-lg'
                  ]);
                echo '  <div id="Modal-content"> </div>';
    Modal::end();// echo $this->render('_search', ['model' => $searchModel]); ?>
     <?php
$script = <<< JS
   $(function()
   {
    $(".ddd").click(function ()
    {
      $("#modal").modal("show").find("#Modal-content").load($(this).attr('href').substr(1));
    });



   }



    );
   
JS;
$this->registerJs($script); 

?>
             <div class="panel-footer">
            <a href=" <?=  Url::to(['userpermissions/add'])?>"   class="btn btn-large btn-primary">Ajouter un compte manager</a></div>

</div>
</div>
</div>

</div>
