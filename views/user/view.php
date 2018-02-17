<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Détail de l\' Utilisateur ';

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
            'last_name',
            'first_name',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'role.name',
        ],
    ]) ?>
    </div>
     <div  class="panel-footer">
          <p>
        <?= Html::a('Modifiez', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimez', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimez cet utilisateur?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
         </div>
    </div>
    </div>
      </div>

