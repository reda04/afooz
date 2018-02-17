<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\Growl;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use kartik\form\ActiveForm;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */
/* @var $form yii\widgets\ActiveForm */
use app\models\operateurhasCriteres;
use yii\web\View ;
use yii\helpers\Url ;
use yii\bootstrap\Modal ;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model app\models\Filtrer */
use kartik\grid\DataColumn;
$this->title = 'Affectation  Filtre: ' . str_replace('_'.Yii::$app->user->identity->enseigneEnseigne->name.'/'.Yii::$app->user->identity->enseigneEnseigne->enseigne_id,'',$model->name);


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

    <div class="filtrer-update">



        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

            <?php $this->registerJsFile('@web/js/filter.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
if (Yii::$app->session->hasFlash('success'))
{
  
              echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Elément enregistré ',
    'icon' => 'fa  fa-check-circle',
    'body' => 'Le critère a bien été ajouté au filtre ',
    'showSeparator' => true,
    'delay' => 0,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);}
           
    $form = ActiveForm::begin(); ?>
            <div class="content-panel">



                <fieldset>
                    <legend>Critères du Filtre
                        <?= str_replace('_'.Yii::$app->user->identity->enseigneEnseigne->name.'/'.Yii::$app->user->identity->enseigneEnseigne->enseigne_id,'',$model->name)?>
                    </legend>

                    <div class="form-group col-xs-12">
                        <a href="#" id="addCriterion" class="btn-primary btn btn-large"><i class="glyphicon glyphicon-plus"></i> Ajouter un critère</a> <br><br>
                        <table id="tableCriteria" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Donnée à filtrer</th>
                                    <th>Opérateur</th>
                                    <th>Valeur</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="criterionTemplate" class="hidden">
                                    <td>

                                      <?php

                                        $tableau_cri =  \yii\helpers\ArrayHelper::map($ophascri,'Critere_id','type'); 
                                       
                                         $tableau_val =  \yii\helpers\ArrayHelper::map($ophascri,'Critere_id','value'); 
                                       echo  $form->field($opcr, 'critere_id')->dropDownList( \yii\helpers\ArrayHelper::map($ophascri,'Critere_id','Nom'), ['prompt'=>''])->label(false) ;
        echo  ' <script> var montableau = new Array(); var montableau_valeur = new Array();' ;                          //    reset($tableau_cri);

                                        while (list($key, $val) = each($tableau_cri)) {
    echo  "\nmontableau[$key]= '$val';";
     if($tableau_val[$key] != null)
                                            {echo "\nmontableau_valeur[$key]= '$tableau_val[$key]';";}
                                       

}    echo  ' </script> ' ;                               

    

    ?>

                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <?= $form->field($opcr, 'operateur_id')->widget(DepDrop::classname(), [
  'options'=>['id'=>'operateur_id'],

    'pluginOptions'=>[
        'depends'=>['operateurhascriteres-critere_id'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/filter/listeoperateurs'])
    ]
])->label(false);?>





                                        </div>
                                    </td>
                                    <td  id='valeurs'>
                                       
                          

                                        
<select id="selecta" class="form-control" name="FilterhasCriteres[selected_value]" aria-required="true" aria-invalid="true">


</select>




                                            <input type="number" id="number" class="form-control" name="FilterhasCriteres[selected_value]" aria-required="true" aria-invalid="true" min="0">
                                             <input type="text" id="text" class="form-control " name="FilterhasCriteres[selected_value]" aria-required="true" aria-invalid="true">
                                         <?= $form->field($criteria, 'selected_value')->widget(DatePicker::classname(), [
                                                                             'options' => ['placeholder' => 'Entrez vôtre date de naissance ...','id'=>'date'],
                                                                              'pluginOptions' => [
        'autoclose'=>true,

        'format' => 'yyyy-mm-dd'
    
    ]
])->label(false);?>

                                           
                                   </div>
                                               </div>
                                    </td>



                                    <td>
                                            <button class="btn-primary btn btn-large" type="submit"><i class="glyphicon glyphicon-edit"></i> Enregistrer</button>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </fieldset>

                <?php 




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


           [
            'vAlign'=>'middle',
            'hAlign'=>'center',
            'label'=> ' Actions',
            'format' => 'html',
            'value' => function($model) {
                 return     Html::a('Supprimer',     Url::to(['filter/delete']).'?filter_id='.$model->filter_id.'&operateur_has_criteres_id='.$model->operateur_has_criteres_id, ['class' => 'linksWithTarget btn btn-danger']);
              }],




            ],
       
    ]); 






    ?>
<?=  Html::a('Activer', ['activate','id'=>$model->filter_id], ['target'=>'_blank','class' => 'linksWithTarget btn btn-primary btn-large'])?>


            </div>



    </div>

    <?php $form = ActiveForm::end(); ?>