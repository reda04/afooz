<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii \helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */

$this->title = $model->name;
?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class=" fa fa-eye"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                
                <li><a href="<?= Url::to(['user/index'])  ?>">Gestion des utilisateurs</a></li>
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
        'class'=> '.table-striped',
        'attributes' => [
            
            'name',
            'contact_email:email',
            'register_required_phone',
         
            
            'typeCommerce.Nom',
        ],
    ]) ?>
   
</div>
     <div  class="panel-footer">
          <p>
   
     <p>
        <?= Html::a('Update', ['update', 'id' => $model->enseigne_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->enseigne_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
   </p>
         </div>
    </div>
    </div>
      </div>

