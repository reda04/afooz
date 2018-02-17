<?php
 use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\models\Operateur;
use yii\web\YiiAsset;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
use  app\models\Criteres ;
/* @var $form yii\widgets\ActiveForm */
/* @var $models app\models\OperateurhasCriteres */
?>
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="<?= Url::to(['criteres/index'])  ?>">Gestion des criteres</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div>

<div class="criteres-form">
	<div class="contentpanel">  
    <div class="row">
        <div class="col-md-9">

 <?php $form = ActiveForm::begin(['layout' => 'horizontal']); 
  
	$list3=\yii\helpers\ArrayHelper::map(Operateur::find()->all(),'Operateur_id','operator');
   if(!$model->isNewRecord) {
   $i=0;
$k=$operateur->find()->where(['critere_id' => $model->Critere_id])->all();
if(!empty($k))
{
foreach ($k as $record) {
   $arr[$i]=$record->getAttributes()['operateur_id'];
   $i++;
}
$operateur->operateur_id=$arr;
}
}
/*
    $x=$model->getOperateurOperateurs();
    $x=\yii\helpers\ArrayHelper::toarray($model->getOperateurOperateurs());
    print_r($x);
    //print_r($k);
    $i=0;
foreach ($k as $record) {
   echo "<pre>";print_r($record->getAttributes()['operateur_id'] );echo"</pre>";
   $arr[$i]=$record->getAttributes()['operateur_id'];
   $i++;
}
//print_r($arr);
//print_r($model->getOperateurOperateurs()); 
/*	echo'</br></br></br></br></br>';
		print_r(\yii\helpers\ArrayHelper::map($model->getOperateurs(),'Operateur_id','operator'));
		print_r($list);



Array ( [1] => est égal à [2] => est différent de [3] => est vide [4] => contient [5] => ne contient pas [6] => commence par [7] => finit par [8] => est plus grand que [9] => est plus petit que [10] => est avant le [11] => est après le )

$records = Dictionaty::findAll(['field' => 'value']);
        */



//print_r($list2);

?>
    <div class="panel panel-default">
                    <div class="panel-heading">                       
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="row">  

    <?= $form->field($model, 'Nom')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'table_name')->dropDownList( \yii\helpers\ArrayHelper::map(Criteres::getalltables(),'table_name','table_name'),['prompt' => '']) ?>
    <?= $form->field($model, 'column_name')->widget(DepDrop::classname(), [
  'options'=>['id'=>'column_name'],

    'pluginOptions'=>[
        'depends'=>['criteres-table_name'],
        'placeholder'=>'Select...',
        'url'=>Url::to(['/criteres/listecolonnes'])
    ]
])?>
    <?= $form->field($model, 'type')->dropDownList([ 'TEXT' => 'TEXT', 'INTEGER' => 'INTEGER', 'DATE' => 'DATE','SELECT' => 'SELECT', ], ['prompt' => '']) ?>
    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title">Liste d'opérateurs: </h3>
                                    </div>
                                    <div class="panel-body" style="display: block;">
                                           <div class="form_group" style="display: block;">
                                  

<?= $form->field($operateur, 'operateur_id')->label(false)->inline()->checkboxList($list3)?>
</div>
                                    </div>
                                </div>

  </div><!-- row -->
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3"> 
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
                      </div>
                    </div><!-- panel-footer -->  
                </div>

    <?php 

    ActiveForm::end(); ?>

</div><!-- col-md-6 -->
    </div>                   
</div>