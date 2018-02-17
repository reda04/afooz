	<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\Growl;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use kartik\form\ActiveForm;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */
/* @var $form yii\widgets\ActiveForm */
use app\models\operateurhasCriteres;
use app\models\FilterhasCriteres;
use yii\web\View ;
use yii\helpers\Url ;
use yii\bootstrap\Modal ;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */

$this->title = 'Activation du  Filtre: ' . $model->name;

$form = ActiveForm::begin();
?>
<style>
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default .btn-default:hover,
        .btn-default:focus,
        .btn-default:active,
        .btn-default.active,
        .open .dropdown-toggle.btn-default {
            background-color: #408bd6 !important;
            color: white !important;
        }
        </style>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-cloud"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Clients</li>
                <li>Ciblage</li>
                 <li>Activation des filtres</li>
                             </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->

<div class="filtrer-index">
 <?php      



 if(FilterhasCriteres::find()->where(['filter_id' => $model->filter_id])->count() >1 ) 
 {                   
                    $data = ['And' => 'Tout les Critères', 'OR'=> 'Au moins un des Critères'];
                     echo $form->field($model, 'operation')->radioButtonGroup($data, [
                    'class' => 'btn-group-sm ',
                    'itemOptions' => ['labelOptions' => ['class' => 'btn  btn-default ']]])->label('les Clients satisfaisant : '); 
}
else
{

    $model->operation=null;
}
                    
                     ?>

	 <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'options' => ['class' => 'panel panel-primary-head'],
        'columns' => [

                [
                    'label' => 'Donnée à filtrer',
                    'format' => 'text',
                    'attribute'=>'Nom',
                    'value' => function($model) {
                    if($model->operateurHasCriteres->critere->Nom!=NULL)
                    {
                   
                       return $model->operateurHasCriteres->critere->Nom;
                    }
                    else
                    {
                        return 'null';
                    }
                    
                },
            ],
               
   [
                'label' => 'opérateur',
                'format' => 'text',
                'attribute'=>'',
                'value' => function($model) {
                    if($model->operateurHasCriteres->operateur->operator!=NULL)
                    {
                   
                       return $model->operateurHasCriteres->operateur->operator;
                    }
                    else
                    {
                        return 'null';
                    }
                    
                },
            ],
              'selected_value' ,

            ],
       
    ]);

     ?>

 <button class="btn-primary btn btn-large" type="submit" ><i class="glyphicon glyphicon-edit"></i> Activer</button>
          </div>
              <?php $form = ActiveForm::end(); ?>