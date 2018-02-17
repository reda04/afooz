<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\offer */

$this->title = 'Paramétres de l\'offre';

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
                 <li>Réglages </li>
                <li><a href="<?= Url::to(['offer/index'])  ?>">Gestion des offres</a></li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->
<div class="user-form">

<div class="contentpanel"> 
<div class="panel ">
  <div  class="panel-heading"><h1 class="panel-title"><?= Html::encode($this->title) ?></h1></div>

  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'title',
            'points',
            'value',
  
        ],
    ]) ?>

</div>
 <div  class="panel-footer">

   <?= Html::a('Modifier', ['update', 'id' => $model->offer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Accepter', ['index'], ['class' => 'btn btn-success', ]) ?>

</div>
</div></div>
</div>
