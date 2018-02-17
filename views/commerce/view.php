<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TypeCommerce */

$this->title = 'Détail du type de commerce';
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
                <li><a href="<?= Url::to(['commerce/index'])  ?>">Gestion des type de commerce</a></li>
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
        ],
    ]) ?>
       
        </div>
     
 <div  class="panel-footer">
       
    <?= Html::a('Mettre à jour', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Accepter', ['index'], ['class' => 'btn btn-success']) ?>
      

</div>
</div></div>
</div>