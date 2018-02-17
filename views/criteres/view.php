<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Criteres */

$this->title = 'Paramétres du critère';

?>
<div class="type-commerce-view">
<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                 <li>Réglages Super-Admin </li>
                <li><a href="<?= Url::to(['criteres/index'])  ?>">Gestion des criteres</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->
<div class="user-form">

<div class="contentpanel"> 
<div class="panel ">
  <div  class="panel-heading"><h1 class="panel-title"><?= Html::encode($this->title) ?></h1></div>

  
    <div  class="panel-body">
         <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nom',
            'value',
            'type',
             [
                'label' => 'operateur',
                'format' => 'ntext',
                'attribute'=>'operator',
                'value' => function($model) {
                    if($model->operateurOperateurs!=NULL)
                    {
                    foreach ($model->operateurOperateurs as $operateur) {
                        $operators[] = $operateur->operator;
                    }
                       return implode("\n", $operators);
                    }
                    else
                    {
                        return 'null';
                    }
                    
                },
            ],
        ],
    ]) ?>
        
   </div>
     
 <div  class="panel-footer">

   <?= Html::a('Modifier', ['update', 'id' => $model->Critere_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Accepter', ['index'], ['class' => 'btn btn-success', ]) ?>

</div>
</div></div>
</div>