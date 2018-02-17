<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Paramétres de l\'événement';

?>
<div class="event-view">

    <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                 <li>Réglages Super-Admin </li>
                <li><a href="<?= Url::to(['event/index'])  ?>">Gestion des événements</a></li>
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
            'event_type',
            'created_at',
        ],
    ]) ?>
          
   </div>
     
 <div  class="panel-footer">
         <?= Html::a('Accepter', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Mettre à jour', ['update', 'id' => $model->event_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->event_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Etes-vous sûr de vouloir supprimer cet élement ?',
                'method' => 'post',
            ],
        ]) ?>
   </div>
</div></div>
</div>
